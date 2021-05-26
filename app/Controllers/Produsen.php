<?php

namespace App\Controllers;

use App\Models\ProdusenModel;

class Produsen extends BaseController
{
    protected $produsenModel;

    public function __construct()
    {
        $this->produsenModel = new ProdusenModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $produsen = $this->produsenModel->search($keyword);
        } else {
            $produsen = $this->produsenModel;
        }

        $itemsCount = 10;
        $currentPage =
            $this->request->getVar('page_produsen') ?
            $this->request->getVar('page_produsen') : 1;
        $startingNumber = 1 + $itemsCount * ($currentPage - 1);

        $data = [
            'title' => 'Daftar Produsen',
            'menu' => 'produsen',
            'produsenList' => $produsen->paginate($itemsCount, 'produsen'),
            'pager' => $produsen->pager,
            'startingNumber' => $startingNumber,
            'keyword' => $keyword
        ];

        return view('produsen/index', $data);
    }

    public function detail($id)
    {
        $produsen = $this->produsenModel->getprodusen($id);

        $data = [
            'title' => 'Detail Produsen',
            'menu' => 'produsen',
            'produsen' => $produsen
        ];

        return view('produsen/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Produsen',
            'menu' => 'produsen',
            'validation' => \Config\Services::validation()
        ];

        return view('produsen/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_produsen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama produsen harus diisi'
                ],
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat prdusen harus diisi'
                ],
            ],
            'tanggal_berdiri' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal berdiri perusahaan harus diisi'
                ],
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telepon produsen harus diisi'
                ],
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email produsen harus diisi'
                ],
            ],
            'pabrik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pabrik produsen harus diisi'
                ],
            ],
            'website' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Website produsen harus diisi'
                ],
            ],
        ])) {
            return redirect()->to('/produsen/create')->withInput();
        }

        $this->produsenModel->save([
            'kode_produsen' => $this->request->getVar('kode_produsen'),
            'nama_produsen' => $this->request->getVar('nama_produsen'),
            'alamat' => $this->request->getVar('alamat'),
            'tanggal_berdiri' => $this->request->getVar('tanggal_berdiri'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'pabrik' => $this->request->getVar('pabrik'),
            'website' => $this->request->getVar('website')
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambah');
        session()->setFlashdata('pesan_text', 'Anda berhasil menambah data baru, silakan tekan OK');
        session()->setFlashdata('pesan_icon', 'success');
        return redirect()->to('/produsen');
    }

    public function delete($id)
    {
        $this->produsenModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        session()->setFlashdata('pesan_text', 'Anda berhasil menghapus data, silakan tekan OK');
        session()->setFlashdata('pesan_icon', 'success');

        return redirect()->to('/produsen');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Produsen',
            'menu' => 'produsen',
            'produsen' => $this->produsenModel->getprodusen($id),
            'validation' => \Config\Services::validation()
        ];

        return view('produsen/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_produsen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama produsen harus diisi'
                ],
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat prdusen harus diisi'
                ],
            ],
            'tanggal_berdiri' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal berdiri perusahaan harus diisi'
                ],
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telepon produsen harus diisi'
                ],
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email produsen harus diisi'
                ],
            ],
            'pabrik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pabrik produsen harus diisi'
                ],
            ],
            'website' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Website produsen harus diisi'
                ],
            ],
        ])) {
            return redirect()->to('/produsen/edit/' . $this->request->getVar('id'))->withInput();
        }

        $this->produsenModel->save([
            'id' => $id,
            'kode_produsen' => $this->request->getVar('kode_produsen'),
            'nama_produsen' => $this->request->getVar('nama_produsen'),
            'alamat' => $this->request->getVar('alamat'),
            'tanggal_berdiri' => $this->request->getVar('tanggal_berdiri'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'pabrik' => $this->request->getVar('pabrik'),
            'website' => $this->request->getVar('website')
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        session()->setFlashdata('pesan_text', 'Anda berhasil mengubah data, silakan tekan OK');
        session()->setFlashdata('pesan_icon', 'success');
        return redirect()->to('/produsen/detail/' . $this->request->getVar('id'))->withInput();
    }
}
