<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Provider\bg_BG\PhoneNumber;

class RegistrasiPerawatanSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $data = [
            [
                'no_registrasi' => $faker->randomNumber(5, true),
                'tgl_masuk' => $faker->date('Y_m_d'),
                'tgl_keluar' => $faker->date('Y_m_d'),
                'poliklinik' => 'Kebidanan',
                'id_dokter'    => $faker->numberBetween(1, 20),
                'id_pasien'    => $faker->numberBetween(1, 20),
                'nama_pasien' => $faker->name(),
            ],
            [
                'no_registrasi' => $faker->randomNumber(5, true),
                'tgl_masuk' => $faker->date('Y_m_d'),
                'tgl_keluar' => $faker->date('Y_m_d'),
                'poliklinik' => 'Anak',
                'id_dokter'    => $faker->numberBetween(1, 20),
                'id_pasien'    => $faker->numberBetween(1, 20),
                'nama_pasien' => $faker->name(),
            ],
            [
                'no_registrasi' => $faker->randomNumber(5, true),
                'tgl_masuk' => $faker->date('Y_m_d'),
                'tgl_keluar' => $faker->date('Y_m_d'),
                'poliklinik' => 'Bedah Umum',
                'id_dokter'    => $faker->numberBetween(1, 20),
                'id_pasien'    => $faker->numberBetween(1, 20),
                'nama_pasien' => $faker->name(),
            ],
            [
                'no_registrasi' => $faker->randomNumber(5, true),
                'tgl_masuk' => $faker->date('Y_m_d'),
                'tgl_keluar' => $faker->date('Y_m_d'),
                'poliklinik' => 'Bedah Plastik',
                'id_dokter'    => $faker->numberBetween(1, 20),
                'id_pasien'    => $faker->numberBetween(1, 20),
                'nama_pasien' => $faker->name(),
            ],
            [
                'no_registrasi' => $faker->randomNumber(5, true),
                'tgl_masuk' => $faker->date('Y_m_d'),
                'tgl_keluar' => $faker->date('Y_m_d'),
                'poliklinik' => 'Bedah Ortophedi',
                'id_dokter'    => $faker->numberBetween(1, 20),
                'id_pasien'    => $faker->numberBetween(1, 20),
                'nama_pasien' => $faker->name(),
            ],
        ];
        $this->db->table('registrasi_perawatan')->insertBatch($data);
    }
}
