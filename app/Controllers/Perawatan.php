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
    protected $pasienModel;
    protected $dokterModel;

    public function __construct()
    {
        $this->perawatanModel = new PerawatanModel();
        $this->pasienModel = new PasienModel();
        $this->dokterModel = new DokterModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $perawatan =  $this->perawatanModel->search($keyword);
        } else {
            $perawatan = $this->perawatanModel;
        }

        $itemsCount = 10;
        $currentPage =
            $this->request->getVar('page_perawatan') ?
            $this->request->getVar('page_perawatan') : 1;
        $startingNumber = 1 + $itemsCount * ($currentPage - 1);

        $data = [
            'title' => 'Daftar Perawatan',
            'menu' => 'perawatan',
            'perawatanList' => $perawatan->paginate($itemsCount, 'perawatan'),
            'pager' => $perawatan->pager,
            'startingNumber' => $startingNumber,
            'keyword' => $keyword
        ];
        return view('perawatan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Registrasi Perawatan',
            'menu' => 'perawatan',
            'noRegistrasi' => $this->perawatanModel->getFreshNoRegistrasi()
        ];
        return view('perawatan/create', $data);
    }

    public function detail($id)
    {
        $pemberianObatModel = new PemberianObatModel();
        $pemberianTindakanModel = new PemberianTindakanModel();

        $perawatan = $this->perawatanModel->getPerawatan($id);
        $pasien = $this->pasienModel->getPasien($perawatan['id_pasien']);
        $dokter = $this->dokterModel->getDokter($perawatan['id_dokter']);
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

    public function edit($id)
    {
        $pemberianObatModel = new PemberianObatModel();
        $pemberianTindakanModel = new PemberianTindakanModel();

        $perawatan = $this->perawatanModel->getPerawatan($id);
        $dokter = $this->dokterModel->getDokter($perawatan['id_dokter']);
        $pasien = $this->pasienModel->getPasien($perawatan['id_pasien']);
        $riwayatTindakan = $pemberianTindakanModel->getPemberianTindakan($id);
        $riwayatObat = $pemberianObatModel->getPemberianObat($id);

        $data = [
            'title' => 'Edit Data Perawatan',
            'menu' => 'perawatan',
            'perawatan' => $perawatan,
            'dokter' => $dokter,
            'pasien' => $pasien,
            'riwayatObat' => $riwayatObat,
            'riwayatTindakan' => $riwayatTindakan
        ];

        return view('perawatan/edit', $data);
    }

    public function save()
    {
        $this->perawatanModel->save([
            'no_registrasi' => $this->request->getVar('no_registrasi'),
            'tgl_masuk' => $this->request->getVar('tgl_masuk'),
            'tgl_keluar' => ($this->request->getVar('tgl_keluar')) ? $this->request->getVar('tgl_keluar') : null,
            'poliklinik' => $this->request->getVar('poliklinik'),
            'id_dokter' => $this->request->getVar('id_dokter'),
            'id_pasien' => $this->request->getVar('id_pasien')
        ]);

        return redirect()->to('/perawatan/detail/' . $this->perawatanModel->db->insertID());
    }

    public function findPasienByNik()
    {
        $nik = $this->request->getVar('nik');
        $result = json_encode($this->pasienModel->getPasienByNik($nik));
        return $result;
    }

    public function findDokterByNik()
    {
        $nik = $this->request->getVar('nik');
        $result = json_encode($this->dokterModel->getDokterByNik($nik));
        return $result;
    }
}
