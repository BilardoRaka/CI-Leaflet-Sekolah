<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SekolahModel;
use App\Models\UserModel;
use App\Models\GaleriModel;

class CredentialController extends BaseController
{

    protected $SekolahModel;
    protected $UserModel;
    protected $GaleriModel;

    public function __construct()
    {
        $this->SekolahModel = new SekolahModel();
        $this->UserModel = new UserModel();
        $this->GaleriModel = new GaleriModel();
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('login', $data);
    }

    public function loginAuth()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $this->UserModel->where('username', $username)->first();

        
        if ($data) {
            $sekolah = $this->SekolahModel->where('user_id', $data['id'])->first();
            if ($data['role'] == 'admin' || $sekolah['isvalid'] == '1') {
                $pass = $data['password'];
                $authenticatePassword = password_verify($password, $pass);
                if ($authenticatePassword) {
                    $ses_data = [
                        'id' => $data['id'],
                        'username' => $data['username'],
                        'password' => $data['password'],
                        'role' => $data['role'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    $session->setFlashdata('msg', 'Anda Berhasil Login.');
                    return redirect()->to('/');
                } else {
                    $session->setFlashdata('msg', 'Password Salah.');
                    return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('msg', 'Hubungi admin untuk mengaktifkan akun!');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username Tidak Tersedia.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        // $session->setFlashdata('msg', 'Anda Berhasil Logout.');
        return redirect()->to('/')->with('msg', 'Anda Berhasil Logout.');
    }

    public function registrasi()
    {
        $data = [
            'title' => 'Registrasi Sekolah',
            'validation' => \Config\Services::validation()
        ];

        return view('registrasi', $data);
    }

    public function registrasiAkun()
    {
        if (!$this->validate([
            'npsn' => [
                'rules' => 'required|is_unique[sekolah.id]',
                'errors' => [
                    'required' => 'Pilih status sekolah.',
                    'is_unique' => 'NPSN sekolah sudah terdaftar di sistem.',
                ],
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih status sekolah.',
                ],
            ],
            'nama' => [
                'rules' => 'required|is_unique[sekolah.nama]',
                'errors' => [
                    'required' => 'Nama sekolah harus diisi.',
                    'is_unique' => 'Nama sekolah sudah terdaftar di sistem.'
                ],
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi kecamatan.'
                ],
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat sekolah harus diisi.'
                ],
            ],
            'latitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih lokasi sekolah di peta yang tersedia.'
                ],
            ],
            'longitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih lokasi sekolah di peta yang tersedia.'
                ],
            ],
            'kepsek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kepala sekolah harus diisi.'
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email sekolah harus diisi.',
                    'valid_email' => 'Email yang diisi tidak valid.'
                ],
            ],
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telepon sekolah harus diisi.'
                ],
            ],
            'username' => [
                'rules' => 'required|min_length[6]|max_length[10]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'min_length' => 'Username minimal 6 kata.',
                    'max_length' => 'Username maksimal 10 kata.'
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[10]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal 6 kata.',
                    'max_length' => 'Password maksimal 10 kata.'
                ],
            ],
            'confirmpwd' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Ulangi password harus diisi.',
                    'matches' => 'Password berbeda!'
                ],
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpeg,image/jpg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar komik terlalu besar.',
                    'is_image' => 'File yang anda upload bukan gambar!',
                    'mime_in' => 'File yang anda upload bukan gambar!'
                ],
            ],
        ])) {

            return redirect()->back()->withInput();

            // return redirect()->to('/registrasi')->withInput();
        }
        $username = $this->request->getvar('username');
        $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
        $this->UserModel->save([
            'username' => $this->request->getvar('username'),
            'password' => $password,
            'role' => 'sekolah',
        ]);

        // $latitude = round($this->request->getVar('latitude'), 2);
        // $longitude = round($this->request->getVar('longitude'), 2);
        $user = $this->UserModel->where(['username' => $username])->first();
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->SekolahModel->save([
            'id' => $this->request->getvar('npsn'),
            'user_id' => $user['id'],
            'nama' => $this->request->getvar('nama'),
            'slug' => $slug,
            'kecamatan' => $this->request->getVar('kecamatan'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'kepsek' => $this->request->getVar('kepsek'),
            'nohp' => $this->request->getVar('nohp'),
            'status' => $this->request->getVar('status'),
            'isvalid' => '0',
            'latitude' => $this->request->getVar('latitude'),
            'longitude' => $this->request->getVar('longitude'),
        ]);

        $files = $this->request->getFileMultiple('gambar');

        $sekolah = $this->SekolahModel->where(['slug' => $slug])->first();
        foreach ($files as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('img/galeri', $newName);

                $this->GaleriModel->save([
                    'sekolah_id' => $sekolah['id'],
                    'image' => $newName
                ]);
            }
        }

        session()->setFlashdata('pesan', 'Registrasi Berhasil, Silahkan hubungi admin untuk mengaktifkan akun!');

        return redirect()->to('/login');
    }

    public function gantipassword()
    {
        $data = [
            'title' => 'Ganti Password',
            'validation' => \Config\Services::validation()
        ];

        if (!session()->get('isLoggedIn')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Forbidden Bos.');
        }

        return view('gantipassword', $data);
    }

    public function gantipasswordsubmit()
    {
        $pwdlama = $this->request->getvar('oldPassword');
        $pwdbaru = password_hash($this->request->getVar('newPassword'), PASSWORD_BCRYPT);
        $authenticatePassword = password_verify($pwdlama, session('password'));

        if (!$this->validate([
            'newPassword' => [
                'rules' => 'required|min_length[6]|max_length[12]',
                'errors' => [
                    'required' => 'Password baru harus diisi.',
                    'min_length' => 'Password baru minimal 6 kata.',
                    'max_length' => 'Password baru maksimal 12 kata.'
                ],
            ],
        ])) {

            return redirect()->back()->withInput();

            // return redirect()->to('/registrasi')->withInput();
        }
        if ($authenticatePassword) {
            $this->UserModel->save([
                'id' => session('id'),
                'password' => $pwdbaru,
                'role' => session('role')
            ]);

            session()->setFlashdata('msg', 'Berhasil mengubah password akun!');

            return redirect()->to('/');
        } else {
            session()->setFlashdata('msg', 'Pasword lama yang dimasukkan salah.');
            return redirect()->to('/gantipassword')->withInput();
        }
    }
}
