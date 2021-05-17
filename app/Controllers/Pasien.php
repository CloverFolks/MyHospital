<?php

namespace App\Controllers;

use App\Models\PasienModel;
use CodeIgniter\HTTP\Request;
use Config\Validation;

class Pasien extends BaseController
{
    protected $pasienModel;
    public function __construct()
    {
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $pasien =  $this->pasienModel->search($keyword);
        } else {
            $pasien = $this->pasienModel;
        }
        $itemsCount = 6;
        $currentPage =
            $this->request->getVar('page_pasien') ?
            $this->request->getVar('page_pasien') : 1;
        $startingNumber = 1 + $itemsCount * ($currentPage - 1);

        $data = [
            'title' => 'Daftar pasien',
            'menu' => 'pasien',
            'pasienList' => $pasien->paginate(6, 'pasien'),
            'pager' => $pasien->pager,
            'startingNumber' => $startingNumber,
            'keyword' => $keyword
        ];
        return view('pasien/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah pasien',
            'menu' => 'pasien',
            'validation' => \Config\Services::validation(),
            'nik' => $this->pasienModel->getFreshNik(),
        ];
        return view('pasien/create', $data);
    }

    public function save()
    {
        //validation
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[pasien.nik]|numeric|min_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                    'numeric' => '{field} hanya boleh diisi angka',
                    'min_length' => '{field} harus terdiri dari 16 angka'
                ]
            ],

            'no_rekam_medis' => [
                'rules' => 'required|is_unique[pasien.no_rekam_medis]|min_length[10]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                    'min_length' => '{field} harus terdiri dari 10 karakter'
                ]
            ],

            'nama_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'no_hp' => [
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
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'golongan_darah' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'alpha' => '{field} hanya bisa diisi alphabet',
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'status_menikah' => [
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
            return redirect()->to('/pasien/create')->withInput();
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

        $status_menikah = $this->request->getVar('status_menikah');
        if ($status_menikah == 'sudah menikah') {
            $status_menikah = 0;
        } else {
            $status_menikah = 1;
        }

        $this->pasienModel->save([
            'nik' => $this->request->getVar('nik'),
            'image_profile' => $namaProfile,
            'no_rekam_medis' => $this->request->getVar('no_rekam_medis'),
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis_kelamin' => $jenis_kelamin,
            'golongan_darah' => $this->request->getVar('golongan_darah'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'status_menikah' => $status_menikah,

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/pasien/index');
    }

    public function delete($id)
    {

        //cari gambar berdasarkan id
        $pasien = $this->pasienModel->find($id);

        // cek jika file gambarnya default.jpg
        if ($pasien['image_profile'] != 'default.jpg') {
            //hapus gambar
            unlink('images/avatar/' . $pasien['image_profile']);
        }

        $this->pasienModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/pasien');
    }

    public function detail($id)
    {

        $pasien = $this->pasienModel->getpasien($id);

        $data = [
            'title' => 'Detail pasien',
            'menu' => 'pasien',
            'pasien' => $pasien,
        ];

        return view('pasien/detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Pasien',
            'menu' => 'pasien',
            'pasien' => $this->pasienModel->getPasien($id),
            'validation' => \Config\Services::validation()
        ];

        return view('pasien/edit', $data);
    }

    public function update($id)
    {
        $pasienLama = $this->pasienModel->getPasien($id);
        if ($pasienLama['nik'] == $this->request->getVar('nik')) {
            $rule_nik = 'required|numeric|min_length[16]';
        } else {
            $rule_nik = 'required|is_unique[pasien.nik]|numeric|min_length[16]';
        };

        if ($pasienLama['no_rekam_medis'] == $this->request->getVar('no_rekam_medis')) {
            $rule_no_rekam_medis = 'required|min_length[10]';
        } else {
            $rule_no_rekam_medis = 'required|is_unique[pasien.no_rekam_medis]|min_length[10]';
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

            'no_rekam_medis' => [
                'rules' => $rule_no_rekam_medis,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                    'min_length' => '{field} harus terdiri dari 10 karakter'
                ]
            ],

            'nama_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'no_hp' => [
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
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'golongan_darah' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'alpha' => '{field} hanya bisa diisi alphabet',
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'status_menikah' => [
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
            return redirect()->to('/pasien/edit')->withInput();
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

        $status_menikah = $this->request->getVar('status_menikah');
        if ($status_menikah == 'sudah menikah') {
            $status_menikah = 0;
        } else {
            $status_menikah = 1;
        }


        $this->pasienModel->save([
            'id' => $id,
            'nik' => $this->request->getVar('nik'),
            'image_profile' => $namaProfile,
            'no_rekam_medis' => $this->request->getVar('no_rekam_medis'),
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis_kelamin' => $jenis_kelamin,
            'golongan_darah' => $this->request->getVar('golongan_darah'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'status_menikah' => $status_menikah
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/pasien/index');
    }
}
