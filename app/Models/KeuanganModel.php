<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'keuangan';
    protected $allowedFields = ['keterangan', 'jumlah'];

    public function search($keyword)
    {
        return $this
            ->table('keuangan')
            ->where(['deleted_at' => null])
            ->like('keterangan', $keyword)
            ->orLike('jumlah', $keyword);
    }
}
