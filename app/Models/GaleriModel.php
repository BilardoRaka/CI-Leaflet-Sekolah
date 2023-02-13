<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table = 'galeri';

    protected $useTimestamps = true;

    protected $allowedFields = ['sekolah_id', 'image'];
}
