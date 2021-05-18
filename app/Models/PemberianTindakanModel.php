<?php

namespace App\Models;

use CodeIgniter\Model;

class PemberianTindakanModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'pemberian_tindakan';
    protected $allowedFields = ['nama_tindakan', 'biaya', 'id_dokter', 'id_registrasi_perawatan', 'metode_pembayaran', 'tanggal'];

    public function getPemberianTindakan($idPerawatan)
    {
        return $this->db
            ->table('pemberian_tindakan')
            ->where(['pemberian_tindakan.deleted_at' => null])
            ->where('id_registrasi_perawatan', $idPerawatan)
            ->select('pemberian_tindakan.*, dokter.nama')
            ->join('dokter', 'pemberian_tindakan.id_dokter = dokter.id')
            ->get()
            ->getResultArray();
    }
}
