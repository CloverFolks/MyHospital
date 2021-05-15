<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table = 'dokter';

    public function getDokter($id = false)
    {
        if (!$id) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }
}
