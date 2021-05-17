<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'obat';

    public function getObatByKode($kode)
    {
        return $this->where(['kode' => $kode])->first();
    }
}
