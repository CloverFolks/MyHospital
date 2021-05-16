<?php

namespace App\Controllers;

use App\Models\DokterModel;
use CodeIgniter\HTTP\Request;
use Config\Validation;

class Dokter extends BaseController
{
    protected $dokterModel;
    public function __construct()
    {
        $this->dokterModel = new DokterModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $dokter =  $this->dokterModel->search($keyword);
        } else {
            $dokter = $this->dokterModel;
        }
        $itemsCount = 6;
        $currentPage =
            $this->request->getVar('page_dokter') ?
            $this->request->getVar('page_dokter') : 1;
        $startingNumber = 1 + $itemsCount * ($currentPage - 1);

        $data = [
            'title' => 'Daftar Dokter',
            'menu' => 'dokter',
            'dokterList' => $dokter->paginate(6, 'dokter'),
            'pager' => $dokter->pager,
            'startingNumber' => $startingNumber,
            'keyword' => $keyword
        ];
        return view('dokter/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Dokter',
            'menu' => 'dokter',
            'validation' => \Config\Services::validation()
        ];
        return view('dokter/create', $data);
    }

    public function save()
    {
        //validation
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[dokter.nik]|numeric|min_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                    'numeric' => '{field} hanya boleh diisi angka',
                    'min_length' => '{field} harus terdiri dari 16 angka'

                ]
            ],
            'nip' => [
                'rules' => 'required|is_unique[dokter.nip]|numeric|min_length[18]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                    'numeric' => '{field} hanya boleh diisi angka',
                    'min_length' => '{field} harus terdiri dari 18 angka'

                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'izin_praktek' => [
                'rules' => 'required|is_unique[dokter.izin_praktek]|min_length[18]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                    'min_length' => '{field} harus terdiri dari 18 karakter'
                ]
            ],
            'tgl_mulai_bekerja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'image_profile' => [
                'rules' => 'max_size[image_profile,1024]|is_image[image_profile]|mime_in[image_profile,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' =>  'Yang anda pilih bukan gambar',
                    'mime_in' =>  'Yang anda pilih bukan gambar'
                ]

            ]

        ])) {
            return redirect()->to('/dokter/create')->withInput();
        }


        //ambil gambar
        $fileProfile = $this->request->getFile('image_profile');

        if ($fileProfile->getError() == 4) {
            $namaProfile = 'default.jpg';
        } else {
            $namaProfile = $fileProfile->getRandomName();

            $fileProfile->move('images/avatar', $namaProfile);
        }

        //ambil jenis kelamin
        $jeniskelamin = $this->request->getVar('jenis_kelamin');
        if ($jeniskelamin == 'laki-laki') {
            $jenis_kelamin = 0;
        } else {
            $jenis_kelamin = 1;
        }

        $this->dokterModel->save([
            'nik' => $this->request->getVar('nik'),
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis_kelamin' => $jenis_kelamin,
            'image_profile' => $namaProfile,
            'izin_praktek' => $this->request->getVar('izin_praktek'),
            'tgl_mulai_bekerja' => $this->request->getVar('tgl_mulai_bekerja'),
            'no_hp' => $this->request->getVar('no_hp')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/dokter/index');
    }

    public function delete($id)
    {

        //cari gambar berdasarkan id
        $dokter = $this->dokterModel->find($id);

        // cek jika file gambarnya default.jpg
        if ($dokter['image_profile'] != 'default.jpg') {
            //hapus gambar
            unlink('images/avatar/' . $dokter['image_profile']);
        }

        $this->dokterModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/dokter');
    }

    public function detail($id)
    {

        $dokter = $this->dokterModel->getDokter($id);

        $data = [
            'title' => 'Detail Dokter',
            'menu' => 'dokter',
            'dokter' => $dokter,
        ];

        return view('dokter/detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Dokter',
            'menu' => 'dokter',
            'dokter' => $this->dokterModel->getDokter($id),
            'validation' => \Config\Services::validation()
        ];

        return view('dokter/edit', $data);
    }

    public function update($id)
    {
        $dokterLama = $this->dokterModel->getDokter($id);
        if ($dokterLama['nik'] == $this->request->getVar('nik')) {
            $rule_nik = 'required|numeric|min_length[16]';
        } else {
            $rule_nik = 'required|is_unique[dokter.nik]|numeric|min_length[16]';
        };

        // $nipLama = $this->dokterModel->getDokter($this->request->getVar('id'));
        if ($dokterLama['nip'] == $this->request->getVar('nip')) {
            $rule_nip = 'required|numeric|min_length[18]';
        } else {
            $rule_nip = 'required|is_unique[dokter.nip]|numeric|min_length[18]';
        };

        // $izin_praktekLama = $this->dokterModel->getDokter($this->request->getVar('id'));
        if ($dokterLama['izin_praktek'] == $this->request->getVar('izin_praktek')) {
            $rule_izin_praktek = 'required|min_length[18]';
        } else {
            $rule_izin_praktek = 'required|is_unique[dokter.izin_praktek]|min_length[18]';
        };


        //validation
        if (!$this->validate([
            'nik' => [
                'rules' => $rule_nik,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                    'numeric' => '{field} hanya boleh diisi angka',
                    'min_length' => '{field} harus terdiri dari 16 angka'

                ]
            ],
            'nip' => [
                'rules' => $rule_nip,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                    'numeric' => '{field} hanya boleh diisi angka',
                    'min_length' => '{field} harus terdiri dari 18 angka'

                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'izin_praktek' => [
                'rules' => $rule_izin_praktek,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                    'min_length' => '{field} harus terdiri dari 18 karakter'
                ]
            ],
            'tgl_mulai_bekerja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'image_profile' => [
                'rules' => 'max_size[image_profile,1024]|is_image[image_profile]|mime_in[image_profile,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' =>  'Yang anda pilih bukan gambar',
                    'mime_in' =>  'Yang anda pilih bukan gambar'
                ]

            ]

        ])) {
            return redirect()->to('/dokter/edit')->withInput();
        }



        $fileProfile = $this->request->getFile('image_profile');


        if ($fileProfile->getError() == 4) {
            $namaProfile = $this->request->getVar('image_profile_lama');
        } else {
            $namaProfile = $fileProfile->getRandomName();
            $fileProfile->move('images/avatar', $namaProfile);
            unlink('images/avatar/' . $this->request->getVar['image_profile_lama']);
        }

        //ambil jenis kelamin
        $jeniskelamin = $this->request->getVar('jenis_kelamin');
        if ($jeniskelamin == 'laki-laki') {
            $jenis_kelamin = 0;
        } else {
            $jenis_kelamin = 1;
        }

        $this->dokterModel->save([
            'id' => $id,
            'nik' => $this->request->getVar('nik'),
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis_kelamin' => $jenis_kelamin,
            'image_profile' => $namaProfile,
            'izin_praktek' => $this->request->getVar('izin_praktek'),
            'tgl_mulai_bekerja' => $this->request->getVar('tgl_mulai_bekerja'),
            'no_hp' => $this->request->getVar('no_hp')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/dokter/index');
    }
}
