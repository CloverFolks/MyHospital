<?php

namespace App\Controllers;

use App\Models\PerawatanModel;

class Perawatan extends BaseController
{
    protected $perawatanModel;

    public function __construct()
    {
        $this->perawatanModel = new PerawatanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Perawatan',
            'perawatan' => $this->perawatanModel->findAll()
        ];
        return view('perawatan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Registrasi Perawatan'
        ];
        return view('perawatan/create', $data);
    }
}
