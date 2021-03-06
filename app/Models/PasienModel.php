<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'pasien';
    protected $allowedFields = ['nik', 'image_profile', 'no_rekam_medis', 'nama_pasien', 'pekerjaan', 'no_hp', 'alamat', 'jenis_kelamin', 'golongan_darah', 'tgl_lahir', 'status_menikah'];

    public function getPasien($id = false)
    {
        if (!$id) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

    public function getFreshNoRekamMedis()
    {
        do {
            $no_rekam_medis = "";
            for ($i = 0; $i < 4; $i++) {
                $no_rekam_medis .= mt_rand(0, 9);
            }
            $no_rekam_medis .= '-';
            for ($i = 0; $i < 2; $i++) {
                $no_rekam_medis .= mt_rand(0, 9);
            }
            $no_rekam_medis .= '-';
            for ($i = 0; $i < 2; $i++) {
                $no_rekam_medis .= mt_rand(0, 9);
            }
        } while ($this->where(['no_rekam_medis' => $no_rekam_medis])->first());
        return $no_rekam_medis;
    }

    public function search($keyword)
    {
        return $this
            ->table('pasien')
            ->where(['deleted_at' => null])
            ->like('nik', $keyword)
            ->orLike('no_rekam_medis', $keyword)
            ->orLike('nama_pasien', $keyword)
            ->orLike('pekerjaan', $keyword)
            ->orLike('no_hp', $keyword)
            ->orLike('jenis_kelamin', $keyword)
            ->orLike('alamat', $keyword)
            ->orLike('golongan_darah', $keyword)
            ->orLike('status_menikah', $keyword);
    }

    public function getPasienByNik($nik)
    {
        return $this->where(['nik' => $nik])->first();
    }
}
