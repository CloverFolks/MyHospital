<?php

namespace App\Models;

use CodeIgniter\Model;

class PerawatanModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'registrasi_perawatan';
    protected $allowedFields = ['no_registrasi', 'tgl_masuk', 'tgl_keluar', 'poliklinik', 'id_dokter', 'id_pasien'];

    public function getPerawatan($id = false)
    {
        if (!$id) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

    public function getDetailPerawatan($id)
    {
        return $this->db
            ->table($this->table)
            ->select('registrasi_perawatan.*, pasien.nik, pasien.no_rekam_medis, pasien.nama_pasien, pasien.jenis_kelamin, pasien.golongan_darah, pasien.tgl_lahir, dokter.nip, dokter.nama, dokter.izin_praktek, dokter.no_hp')
            ->where('registrasi_perawatan.id', $id)
            ->join('dokter', 'registrasi_perawatan.id_dokter = dokter.id')
            ->join('pasien', 'registrasi_perawatan.id_pasien = pasien.id')
            ->get()
            ->getRowArray();
    }

    public function getFreshNoRegistrasi()
    {
        do {
            $noRegistrasi = "";
            for ($i = 0; $i < 10; $i++) {
                $noRegistrasi .= mt_rand(0, 9);
            }
        } while ($this->where(['no_registrasi' => $noRegistrasi])->first());
        return $noRegistrasi;
    }

    public function search($keyword)
    {
        return $this
            ->where(['deleted_at' => null])
            ->table('registrasi_perawatan')
            ->like('no_registrasi', $keyword)
            ->orLike('poliklinik', $keyword)
            ->orLike('tgl_masuk', $keyword)
            ->orLike('tgl_keluar', $keyword)
            ->orderBy('tgl_masuk', 'DESC');
    }
}
