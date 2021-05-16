<?php

namespace App\Models;

use CodeIgniter\Model;

class PerawatanModel extends Model
{
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
            ->table('registrasi_perawatan')
            ->like('no_registrasi', $keyword)
            ->orLike('poliklinik', $keyword)
            ->orLike('tgl_masuk', $keyword)
            ->orLike('tgl_keluar', $keyword)
            ->orderBy('tgl_masuk', 'DESC');
    }
}
