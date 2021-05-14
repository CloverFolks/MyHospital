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
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $perawatan =  $this->perawatanModel->search($keyword);
        } else {
            $perawatan = $this->perawatanModel;
        }

        $itemsCount = 6;
        $currentPage =
            $this->request->getVar('page_perawatan') ?
            $this->request->getVar('page_perawatan') : 1;
        $startingNumber = 1 + $itemsCount * ($currentPage - 1);

        $data = [
            'title' => 'Daftar Perawatan',
            'perawatanList' => $perawatan->paginate(6, 'perawatan'),
            'pager' => $perawatan->pager,
            'startingNumber' => $startingNumber,
            'keyword' => $keyword
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

    public function detail()
    {
        $data = [
            'title' => 'Detail Perawatan'
        ];
        return view('perawatan/detail', $data);
    }

    public function edit()
    {
    }
}
