<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use App\Models\UserModel;
use App\Models\GaleriModel;
use App\Models\JurusanModel;

class SekolahController extends BaseController
{
    protected $SekolahModel;
    protected $GaleriModel;
    protected $UserModel;
    protected $JurusanModel;

    public function __construct()
    {
        $this->SekolahModel = new SekolahModel();
        $this->UserModel = new UserModel();
        $this->GaleriModel = new GaleriModel();
        $this->JurusanModel = new JurusanModel();
    }

    public function index()
    {
        $current_page = $this->request->getVar('page_sekolah') ? $this->request->getVar('page_sekolah') : 1;
        $keyword = $this->request->getVar('keyword');
        
        if ($keyword) {
            $sekolah = $this->SekolahModel->where('isvalid', '1')->search($keyword);
        } else {
            $sekolah = $this->SekolahModel->where('isvalid', '1');
        }


        $data = [
            'title' => 'Daftar Sekolah',
            'sekolah' => $sekolah->paginate(7, 'sekolah'),
            'pager' => $sekolah->pager,
            'currentPage' => $current_page,
        ];

        return view('sekolah/index', $data);
    }

    public function detail($slug)
    {
        $sekolah = $this->SekolahModel->where('isvalid', '1')->getSekolah($slug);
        if($sekolah) {
            $galeri = $this->GaleriModel->where('sekolah_id', $sekolah['id'])->findAll();
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Sekolah Tidak Ditemukan.');
        }
        $jurusan = $this->JurusanModel->where('sekolah_id', $sekolah['id'])->findAll();

        $data = [
            'title' => 'Detail Sekolah',
            'sekolah' => $sekolah,
            'galeris' => $galeri,
            'jurusans' => $jurusan
        ];

        if (empty($data['sekolah'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Sekolah Tidak Ditemukan.');
        }

        return view('sekolah/detail', $data);
    }

    public function hapus($id)
    {
        // $this->SekolahModel->delete($id);
        $this->UserModel->delete($id);

        session()->setFlashdata('pesan', 'Data Sekolah Berhasil Dihapus!');

        return redirect()->to('/validasiakun');
    }

    public function profil()
    {
        $sekolah = $this->SekolahModel->where('user_id', session('id'))->first();
        $galeri = $this->GaleriModel->where('sekolah_id', $sekolah['id'])->findAll();
        $jurusan = $this->JurusanModel->where('sekolah_id', $sekolah['id'])->findAll();


        $data = [
            'title' => 'Profil Sekolah',
            'sekolah' => $sekolah,
            'galeris' => $galeri,
            'jurusans' => $jurusan
        ];

        return view('profil', $data);
    }

    public function ubahprofil()
    {
        $sekolah = $this->SekolahModel->where('user_id', session('id'))->first();
        $galeris = $this->GaleriModel->where('sekolah_id', $sekolah['id'])->findAll();
        $jurusan = $this->JurusanModel->where('sekolah_id', $sekolah['id'])->findAll();

        $data = [
            'title' => 'Ubah Profil',
            'sekolah' => $sekolah,
            'galeris' => $galeris,
            'jurusans' => $jurusan,
            'validation' => \Config\Services::validation(),
        ];

        return view('sekolah/ubahprofil', $data);
    }

    public function updateprofil($id)
    {
        // $nama_jurusan = $this->request->getVar('nama_jurusan');
        // dd($nama_jurusan);
        $sekolahLama = $this->SekolahModel->getSekolah($this->request->getVar('slug'));
        if ($sekolahLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[sekolah.nama]';
        }

        if (!$this->validate([
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih status sekolah.',
                ],
            ],
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Nama sekolah harus diisi.',
                    'is_unique' => 'Sekolah sudah terdaftar di sistem.'
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
            'guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah guru harus diisi.'
                ],
            ],
            'siswa_laki' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah siswa laki-laki harus diisi.'
                ],
            ],
            'siswa_perempuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah siswa perempuan harus diisi.'
                ],
            ],
            'siswa_perempuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah siswa perempuan harus diisi.'
                ],
            ],
            'akreditasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Akreditasi sekolah harus diisi.'
                ],
            ],
            'kurikulum' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kurikulum sekolah harus diisi.'
                ],
            ],
            'penyelenggaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penyelenggaraan sekolah harus diisi.'
                ],
            ],
            'ruang_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah ruang kelas sekolah harus diisi.'
                ],
            ],
            'laboratorium' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah laboratorium sekolah harus diisi.'
                ],
            ],
            'perpustakaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah perpustakaan sekolah harus diisi.'
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

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->SekolahModel->save([
            'id' => $id,
            'nama' => $this->request->getvar('nama'),
            'slug' => $slug,
            'kecamatan' => $this->request->getVar('kecamatan'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'kepsek' => $this->request->getVar('kepsek'),
            'nohp' => $this->request->getVar('nohp'),
            'status' => $this->request->getVar('status'),
            'latitude' => $this->request->getVar('latitude'),
            'longitude' => $this->request->getVar('longitude'),
            'akreditasi' => $this->request->getVar('akreditasi'),
            'kurikulum' => $this->request->getVar('kurikulum'),
            'penyelenggaraan' => $this->request->getVar('penyelenggaraan'),
            'guru' => $this->request->getVar('guru'),
            'siswa_laki' => $this->request->getVar('siswa_laki'),
            'siswa_perempuan' => $this->request->getVar('siswa_perempuan'),
            'ruang_kelas' => $this->request->getVar('ruang_kelas'),
            'laboratorium' => $this->request->getVar('laboratorium'),
            'perpustakaan' => $this->request->getVar('perpustakaan'),
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

        $jurusans = $this->JurusanModel->where('sekolah_id', $sekolah['id'])->findAll();
        foreach($jurusans as $jurusan){
            $this->JurusanModel->delete($jurusan['id']);
        }

        $nama_jurusan = $this->request->getVar('nama_jurusan');
        if(!$nama_jurusan == null) {
            for ($i=0; $i < count($nama_jurusan); $i++) { 
                $this->JurusanModel->save([
                    'sekolah_id' => $id,
                    'nama_jurusan' => $nama_jurusan[$i],
                ]);
            }
        }

        session()->setFlashdata('pesan', 'Profil sekolah berhasil diperbarui!');

        return redirect()->to('/profil');
    }

    public function deleteimage($id)
    {
        $galeri = $this->GaleriModel->where(['id' => $id])->first();
        $this->GaleriModel->delete($id);
        unlink('img/galeri/' . $galeri['image']);
        return redirect()->back();
    }

    public function validasiakun()
    {   
        if(session('role') != 'admin') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak punya otoritas admin!');
        }
            $current_page = $this->request->getVar('page_sekolah') ? $this->request->getVar('page_sekolah') : 1;
            $keyword = $this->request->getVar('keyword');
            
            if ($keyword) {
                $sekolah = $this->SekolahModel->where('isvalid', '0')->search($keyword);
            } else {
                $sekolah = $this->SekolahModel->where('isvalid', '0');
            }
            
            $data = [
                'title' => 'Validasi Akun',
                'sekolah' => $sekolah->paginate(7, 'sekolah'),
                'pager' => $sekolah->pager,
                'currentPage' => $current_page,
        ];

        return view('sekolah/validasiakun', $data);
    }

    public function validasi($id)
    {
        $this->SekolahModel->save([
            'id' => $id,
            'isvalid' => '1'
        ]);

        session()->setFlashdata('pesan', 'Akun sekolah berhasil di validasi!');

        return redirect()->to('/validasiakun');
    }

    public function nonvalidasi($id)
    {
        $this->SekolahModel->save([
            'id' => $id,
            'isvalid' => '0'
        ]);

        session()->setFlashdata('pesan', 'Akun sekolah berhasil di non-validasi!');

        return redirect()->to('/sekolah');
    }
}
