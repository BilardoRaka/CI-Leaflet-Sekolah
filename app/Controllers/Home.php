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
        $data = [
            'title' => 'Pemetaan',
            'sekolah' => $sekolah
        ];

        return view('map', $data);
    }
}
