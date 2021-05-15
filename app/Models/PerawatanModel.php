<?php

namespace App\Models;

use CodeIgniter\Model;

class PerawatanModel extends Model
{
    protected $table = 'registrasi_perawatan';

    public function getPerawatan($id = false)
    {
        if (!$id) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
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
