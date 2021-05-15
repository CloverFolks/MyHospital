<?php

namespace App\Models;

use CodeIgniter\Model;

class PemberianTindakanModel extends Model
{
    protected $table = 'pemberian_tindakan';

    public function getPemberianTindakan($idPerawatan)
    {
        return $this->where(['id_registrasi_perawatan' => $idPerawatan])->findAll();
    }
}
