<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'obat';
    protected $allowedFields = ['kode', 'nama_obat', 'jenis_obat', 'label_obat', 'produsen', 'kategori', 'komposisi', 'aturan_pakai', 'kontra_indikasi', 'no_bpom'];

    public function getObat($id = false)
    {
        if (!$id) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

    public function getFreshKode()
    {
        do {
            $kode = "";
            for ($i = 0; $i < 13; $i++) {
                $kode .= mt_rand(0, 9);
            }
        } while ($this->where(['kode' => $kode])->first());
        return $kode;
    }

    public function search($keyword)
    {
        return $this
            ->table('obat')
            ->like('kode', $keyword)
            ->orLike('nama_obat', $keyword)
            ->orLike('jenis_obat', $keyword)
            ->orLike('produsen', $keyword);
    }

    public function getObatByKode($kode)
    {
        return $this->where(['kode' => $kode])->first();
    }
}
