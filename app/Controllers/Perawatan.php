<?php

namespace App\Controllers;

use App\Models\DokterModel;
use App\Models\PasienModel;
use App\Models\ObatModel;
use App\Models\PemberianObatModel;
use App\Models\PemberianTindakanModel;
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
            'menu' => 'perawatan',
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
            'title' => 'Registrasi Perawatan',
            'menu' => 'perawatan'
        ];
        return view('perawatan/create', $data);
    }

    public function detail($id)
    {
        $dokterModel = new DokterModel();
        $pasienModel = new PasienModel();
        $pemberianObatModel = new PemberianObatModel();
        $pemberianTindakanModel = new PemberianTindakanModel();

        $perawatan = $this->perawatanModel->getPerawatan($id);
        $dokter = $dokterModel->getDokter($perawatan['id_dokter']);
        $pasien = $pasienModel->getPasien($perawatan['id_pasien']);
        $riwayatTindakan = $pemberianTindakanModel->getPemberianTindakan($id);
        $riwayatObat = $pemberianObatModel->getPemberianObat($id);

        $data = [
            'title' => 'Detail Perawatan',
            'menu' => 'perawatan',
            'perawatan' => $perawatan,
            'dokter' => $dokter,
            'pasien' => $pasien,
            'riwayatObat' => $riwayatObat,
            'riwayatTindakan' => $riwayatTindakan
        ];

        return view('perawatan/detail', $data);
    }

    public function edit()
    {
    }
}
