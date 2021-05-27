<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdusenModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'produsen';
    protected $allowedFields = ['kode_produsen', 'nama_produsen', 'alamat', 'tanggal_berdiri', 'telepon', 'email', 'pabrik', 'website'];

    public function getProdusen($id = false)
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
            $kode_produsen = "";
            for ($i = 0; $i < 13; $i++) {
                $kode_produsen .= mt_rand(0, 9);
            }
        } while ($this->where(['kode_produsen' => $kode_produsen])->first());
        return $kode_produsen;
    }

    public function search($keyword)
    {
        return $this
            ->table('produsen')
            ->where(['deleted_at' => null])
            ->like('nama_produsen', $keyword)
            ->orLike('telepon', $keyword)
            ->orLike('email', $keyword)
            ->orLike('website', $keyword);
    }
}
