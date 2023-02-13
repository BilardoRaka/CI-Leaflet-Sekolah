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
        $data = [
            'title' => 'Pemetaan',
            'sekolah' => $this->SekolahModel->findAll()
        ];

        return view('map', $data);
    }
}
