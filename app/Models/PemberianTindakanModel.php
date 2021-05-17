<?php

namespace App\Models;

use CodeIgniter\Model;

class PemberianTindakanModel extends Model
{
    protected $table = 'pemberian_tindakan';
    protected $allowedFields = ['nama_tindakan', 'biaya', 'id_dokter', 'id_registrasi_perawatan', 'metode_pembayaran', 'tanggal'];

    public function getPemberianTindakan($idPerawatan)
    {
        return $this->where(['id_registrasi_perawatan' => $idPerawatan])->findAll();
    }
}
