<?php

namespace App\Controllers;

use App\Models\ObatModel;

class Obat extends BaseController
{
    protected $obatModel;

    public function __construct()
    {
        $this->obatModel = new ObatModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $obat = $this->obatModel->search($keyword);
        } else {
            $obat = $this->obatModel;
        }

        $itemsCount = 10;
        $currentPage =
            $this->request->getVar('page_obat') ?
            $this->request->getVar('page_obat') : 1;
        $startingNumber = 1 + $itemsCount * ($currentPage - 1);

        $data = [
            'title' => 'Daftar Obat',
            'menu' => 'obat',
            'obatList' => $obat->paginate($itemsCount, 'obat'),
            'pager' => $obat->pager,
            'startingNumber' => $startingNumber,
            'keyword' => $keyword
        ];

        return view('obat/index', $data);
    }

    public function detail($id)
    {
        $obat = $this->obatModel->getobat($id);

        $data = [
            'title' => 'Detail Obat',
            'menu' => 'obat',
            'obat' => $obat
        ];

        return view('obat/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Obat',
            'menu' => 'obat',
            'kode' => $this->obatModel->getFreshKode(),
            'validation' => \Config\Services::validation()
        ];

        return view('obat/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama obat harus diisi'
                ],
            ],
            'jenis_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis obat harus diisi'
                ],
            ],
            'label_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Label obat harus diisi'
                ],
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori obat harus diisi'
                ],
            ],
            'komposisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Komposisi obat harus diisi'
                ],
            ],
            'aturan_pakai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Aturan pakai obat harus diisi'
                ],
            ],
            'kontra_indikasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kontra indikasi obat harus diisi'
                ],
            ],
            'no_bpom' => [
                'rules' => 'required|is_unique[obat.no_bpom]|min_length[8]|max_length[20]',
                'errors' => [
                    'required' => 'Nomor BPOM obat harus diisi',
                    'is_unique' => 'Nomor BPOM obat sudah ada',
                    'min_length' => 'Nomor BPOM obat harus terdiri dari min. 8 angka',
                    'max_length' => 'Nomor BPOM obat harus terdiri dari max. 20 angka'
                ],
            ],
        ])) {
            return redirect()->to('/obat/create')->withInput();
        }

        $this->obatModel->save([
            'kode' => $this->request->getVar('kode'),
            'nama_obat' => $this->request->getVar('nama_obat'),
            'jenis_obat' => $this->request->getVar('jenis_obat'),
            'label_obat' => $this->request->getVar('label_obat'),
            'kategori' => $this->request->getVar('kategori'),
            'komposisi' => $this->request->getVar('komposisi'),
            'aturan_pakai' => $this->request->getVar('aturan_pakai'),
            'kontra_indikasi' => $this->request->getVar('kontra_indikasi'),
            'no_bpom' => $this->request->getVar('no_bpom'),
            'id_produsen' => $this->request->getVar('id_produsen')
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambah');
        session()->setFlashdata('pesan_text', 'Anda berhasil menambah data baru, silakan tekan OK');
        session()->setFlashdata('pesan_icon', 'success');
        return redirect()->to('/obat');
    }

    public function delete($id)
    {
        $this->obatModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        session()->setFlashdata('pesan_text', 'Anda berhasil menghapus data, silakan tekan OK');
        session()->setFlashdata('pesan_icon', 'success');

        return redirect()->to('/obat');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Obat',
            'menu' => 'obat',
            'obat' => $this->obatModel->getObat($id),
            'validation' => \Config\Services::validation()
        ];

        return view('obat/edit', $data);
    }

    public function update($id)
    {
        $no_bpomLama = $this->obatModel->getObat($this->request->getVar('id'));
        if ($no_bpomLama['no_bpom'] == $this->request->getVar('no_bpom')) {
            $rule_no_bpom = 'required|min_length[8]|max_length[20]';
        } else {
            $rule_no_bpom = 'required|is_unique[obat.no_bpom]|min_length[8]|max_length[20]';
        }

        if (!$this->validate([
            'nama_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama obat harus diisi'
                ],
            ],
            'jenis_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis obat harus diisi'
                ],
            ],
            'label_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Label obat harus diisi'
                ],
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori obat harus diisi'
                ],
            ],
            'komposisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Komposisi obat harus diisi'
                ],
            ],
            'aturan_pakai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Aturan pakai obat harus diisi'
                ],
            ],
            'kontra_indikasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kontra indikasi obat harus diisi'
                ],
            ],
            'no_bpom' => [
                'rules' => $rule_no_bpom,
                'errors' => [
                    'required' => 'Nomor BPOM obat harus diisi',
                    'is_unique' => 'Nomor BPOM obat sudah ada',
                    'min_length' => 'Nomor BPOM obat harus terdiri dari min. 8 angka',
                    'max_length' => 'Nomor BPOM obat harus terdiri dari max. 20 angka'
                ],
            ],
        ])) {
            return redirect()->to('/obat/edit/' . $this->request->getVar('id'))->withInput();
        }

        $this->obatModel->save([
            'id' => $id,
            'kode' => $this->request->getVar('kode'),
            'nama_obat' => $this->request->getVar('nama_obat'),
            'jenis_obat' => $this->request->getVar('jenis_obat'),
            'label_obat' => $this->request->getVar('label_obat'),
            'produsen' => $this->request->getVar('produsen'),
            'kategori' => $this->request->getVar('kategori'),
            'komposisi' => $this->request->getVar('komposisi'),
            'aturan_pakai' => $this->request->getVar('aturan_pakai'),
            'kontra_indikasi' => $this->request->getVar('kontra_indikasi'),
            'no_bpom' => $this->request->getVar('no_bpom'),
            'id_produsen' => $this->request->getVar('id_produsen')
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        session()->setFlashdata('pesan_text', 'Anda berhasil mengubah data, silakan tekan OK');
        session()->setFlashdata('pesan_icon', 'success');
        return redirect()->to('/obat/detail/' . $this->request->getVar('id'))->withInput();
    }
}
