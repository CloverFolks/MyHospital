<?php

namespace App\Models;

use CodeIgniter\Model;

class PemberianObatModel extends Model
{
    protected $table = 'pemberian_obat';
    protected $allowedFields = ['id_obat', 'kuantitas', 'tanggal', 'id_registrasi_perawatan', 'biaya', 'metode_pembayaran'];

    public function getPemberianObat($idPerawatan)
    {
        return $this->db
            ->table('pemberian_obat')
            ->where('id_registrasi_perawatan', $idPerawatan)
            ->join('obat', 'pemberian_obat.id_obat = obat.id')
            ->get()
            ->getResultArray();
    }
}
