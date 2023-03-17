<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table = 'jurusan';

    protected $useTimestamps = true;

    protected $allowedFields = ['sekolah_id', 'nama_jurusan'];
}
