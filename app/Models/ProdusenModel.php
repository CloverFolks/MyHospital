<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdusenModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'produsen';
    protected $allowedFields = ['nama_produsen', 'alamat', 'tanggal_berdiri', 'telepon', 'email', 'pabrik', 'website'];

    public function getProdusen($id = false)
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
            ->table('produsen')
            ->where(['deleted_at' => null])
            ->like('nama_produsen', $keyword)
            ->orLike('telepon', $keyword)
            ->orLike('email', $keyword)
            ->orLike('website', $keyword);
    }
}
