<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $SekolahModel;
    protected $UserModel;

    public function __construct()
    {
        $this->SekolahModel = new SekolahModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];

        return view('index', $data);
    }

    public function map()
    {
        $sekolah = $this->SekolahModel->findAll();
        $kecamatan = array_unique($this->SekolahModel->findColumn('kecamatan'));

        $data = [
            'title' => 'Pemetaan',
            'sekolah' => $sekolah,
            'kecamatan' => $kecamatan
        ];

        return view('map', $data);
    }
}
