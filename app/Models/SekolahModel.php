<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $table = 'sekolah';

    protected $useTimestamps = true;
    
    protected $useAutoIncrement = false;

    protected $allowedFields = ['id','user_id', 'nama', 'slug', 'kecamatan', 'alamat', 'kepsek', 'email', 'nohp', 'status', 'latitude', 'longitude','isvalid'];

    public function getSekolah($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        // $builder = $this->table('orang');
        // $builder->like('nama', $keyword);
        // return $builder;

        return $this->table('sekolah')->like('nama', $keyword)->orLike('alamat', $keyword);
    }
}
