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
    protected $obatModel;
    protected $pemberianObatModel;
    protected $pemberianTindakanModel;

    public function __construct()
    {
        $this->perawatanModel = new PerawatanModel();
        $this->pasienModel = new PasienModel();
        $this->dokterModel = new DokterModel();
        $this->obatModel = new ObatModel();
        $this->pemberianObatModel = new PemberianObatModel();
        $this->pemberianTindakanModel = new PemberianTindakanModel();
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
        $perawatan = $this->perawatanModel->getDetailPerawatan($id);
        $riwayatTindakan = $this->pemberianTindakanModel->getPemberianTindakan($id);
        $riwayatObat = $this->pemberianObatModel->getPemberianObat($id);

        $data = [
            'title' => 'Detail Perawatan',
            'menu' => 'perawatan',
            'perawatan' => $perawatan,
            'riwayatObat' => $riwayatObat,
            'riwayatTindakan' => $riwayatTindakan
        ];

        return view('perawatan/detail', $data);
    }

    public function edit($id)
    {
        $perawatan = $this->perawatanModel->getDetailPerawatan($id);

        $data = [
            'title' => 'Edit Data Perawatan',
            'menu' => 'perawatan',
            'perawatan' => $perawatan
        ];

        return view('perawatan/edit', $data);
    }

    public function save($id = false)
    {
        $data = [
            'no_registrasi' => $this->request->getVar('no_registrasi'),
            'tgl_masuk' => $this->request->getVar('tgl_masuk'),
            'tgl_keluar' => ($this->request->getVar('tgl_keluar')) ? $this->request->getVar('tgl_keluar') : null,
            'poliklinik' => $this->request->getVar('poliklinik'),
            'id_dokter' => $this->request->getVar('id_dokter'),
            'id_pasien' => $this->request->getVar('id_pasien')
        ];

        if ($id) {
            $data = array_merge(['id' => $id], $data);
            $this->perawatanModel->save($data);
        } else {
            $this->perawatanModel->save($data);
            $id = $this->perawatanModel->db->insertID();
        }

        return redirect()->to('/perawatan/detail/' . $id);
    }

    public function delete($id)
    {
        $this->perawatanModel->delete($id);
        return redirect()->to('/perawatan');
    }

    public function savePemberianTindakan($id = false)
    {
        $data = [
            'nama_tindakan' => $this->request->getVar('tindakan_nama'),
            'biaya' => $this->request->getVar('tindakan_biaya'),
            'id_dokter' => $this->request->getVar('tindakan_id_dokter'),
            'id_registrasi_perawatan' => $this->request->getVar('tindakan_id_perawatan'),
            'metode_pembayaran' => $this->request->getVar('tindakan_metode_pembayaran'),
            'tanggal' => $this->request->getVar('tindakan_tanggal')
        ];

        if ($id) {
            $data = array_merge(['id' => $id], $data);
        }

        $this->pemberianTindakanModel->save($data);

        return redirect()->to('/perawatan/detail/' . $this->request->getVar('tindakan_id_perawatan'));
    }

    public function deletePemberianTindakan()
    {
        $id = $this->request->getVar('id_tindakan');
        $pemberianTindakan = $this->pemberianTindakanModel->find($id);
        $idPerawatan = $pemberianTindakan['id_registrasi_perawatan'];
        $this->pemberianTindakanModel->delete($id);
        return redirect()->to('/perawatan/detail/' . $idPerawatan);
    }

    public function savePemberianObat($id = false)
    {
        $data = [
            'id_obat' => $this->request->getVar('obat_id_obat'),
            'kuantitas' => $this->request->getVar('obat_kuantitas'),
            'tanggal' => $this->request->getVar('obat_tanggal'),
            'id_registrasi_perawatan' => $this->request->getVar('obat_id_perawatan'),
            'biaya' => $this->request->getVar('obat_biaya'),
            'metode_pembayaran' => $this->request->getVar('obat_metode_pembayaran')
        ];

        if ($id) {
            $data = array_merge(['id' => $id], $data);
        }

        $this->pemberianObatModel->save($data);

        return redirect()->to('/perawatan/detail/' . $this->request->getVar('obat_id_perawatan'));
    }

    public function deletePemberianObat()
    {
        $id = $this->request->getVar('id_pemberian_obat');
        $pemberianObat = $this->pemberianObatModel->find($id);
        $idPerawatan = $pemberianObat['id_registrasi_perawatan'];
        $this->pemberianObatModel->delete($id);
        return redirect()->to('/perawatan/detail/' . $idPerawatan);
    }

    public function findPasienByNik()
    {
        $nik = $this->request->getVar('nik');
        $result = json_encode($this->pasienModel->getPasienByNik($nik));
        return $result;
    }

    public function findDokterByNip()
    {
        $nip = $this->request->getVar('nip');
        $result = json_encode($this->dokterModel->getDokterByNip($nip));
        return $result;
    }

    public function findObatByKode()
    {
        $kode = $this->request->getVar('kode');
        $result = json_encode($this->obatModel->getObatByKode($kode));
        return $result;
    }

    public function findPemberianTindakanById()
    {
        $id = $this->request->getVar('id');
        $tindakan = $this->pemberianTindakanModel->find($id);
        $dokter = $this->dokterModel->find($tindakan['id_dokter']);

        return json_encode([
            'tindakan' => $tindakan,
            'dokter' => $dokter
        ]);
    }

    public function findPemberianObatById()
    {
        $id = $this->request->getVar('id');
        $pemberianObat = $this->pemberianObatModel->find($id);
        $obat = $this->obatModel->find($pemberianObat['id_obat']);

        return json_encode([
            'pemberianObat' => $pemberianObat,
            'obat' => $obat
        ]);
    }
}
