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
            'title' => 'Laporan Keuangan',
            'menu' => 'keuangan',
            'keuanganList' => $keuangan->paginate($itemsCount, 'keuangan'),
            'pager' => $keuangan->pager,
            'startingNumber' => $startingNumber,
            'keyword' => $keyword
        ];

        return view('keuangan/index', $data);
    }

    public function saveLaporan($id = false)
    {
        $jenis = $this->request->getVar('jenis');
        $keterangan = $this->request->getVar('keterangan');
        $jumlah = $this->request->getVar('jumlah');

        $jumlah = ($jenis == 'pemasukan') ? $jumlah : $jumlah * -1;

        $data = [
            'keterangan' => $keterangan,
            'jumlah' => $jumlah
        ];

        if ($id) {
            $data = array_merge(['id' => $id], $data);
        }

        $this->keuanganModel->save($data);
        return redirect()->to('/keuangan');
    }

    public function findById()
    {
        $id = $this->request->getVar('id');
        return json_encode($this->keuanganModel->find($id));
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->keuanganModel->delete($id);
        return redirect()->to('/keuangan');
    }
}
