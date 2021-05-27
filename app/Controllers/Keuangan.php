<?php

namespace App\Controllers;

use App\Models\DokterModel;
use App\Models\PasienModel;
use App\Models\ObatModel;
use App\Models\PemberianObatModel;
use App\Models\PemberianTindakanModel;
use App\Models\KeuanganModel;

class Keuangan extends BaseController
{
    protected $keuanganModel;

    public function __construct()
    {
        $this->keuanganModel = new KeuanganModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $keuangan =  $this->keuanganModel->search($keyword);
        } else {
            $keuangan = $this->keuanganModel;
        }

        $itemsCount = 10;
        $currentPage =
            $this->request->getVar('page_keuangan') ?
            $this->request->getVar('page_keuangan') : 1;
        $startingNumber = 1 + $itemsCount * ($currentPage - 1);

        $data = [
            'title' => 'Daftar Keuangan',
            'menu' => 'keuangan',
            'keuanganList' => $keuangan->paginate($itemsCount, 'keuangan'),
            'pager' => $keuangan->pager,
            'startingNumber' => $startingNumber,
            'keyword' => $keyword
        ];

        return view('keuangan/index', $data);
    }
}
