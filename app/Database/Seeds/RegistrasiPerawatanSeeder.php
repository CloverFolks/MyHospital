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
        for ($i = 0; $i < 6; $i++) {
            $data = [
                [
                    'no_registrasi' => $faker->numerify('##########'),
                    'tgl_masuk' => $faker->date('Y_m_d'),
                    'tgl_keluar' => $faker->date('Y_m_d'),
                    'poliklinik' => 'Kebidanan',
                    'id_dokter'    => $faker->numberBetween(1, 20),
                    'id_pasien'    => $faker->numberBetween(1, 20)
                ],
                [
                    'no_registrasi' => $faker->numerify('##########'),
                    'tgl_masuk' => $faker->date('Y_m_d'),
                    'tgl_keluar' => $faker->date('Y_m_d'),
                    'poliklinik' => 'Anak',
                    'id_dokter'    => $faker->numberBetween(1, 20),
                    'id_pasien'    => $faker->numberBetween(1, 20)
                ],
                [
                    'no_registrasi' => $faker->numerify('##########'),
                    'tgl_masuk' => $faker->date('Y_m_d'),
                    'tgl_keluar' => $faker->date('Y_m_d'),
                    'poliklinik' => 'Bedah Umum',
                    'id_dokter'    => $faker->numberBetween(1, 20),
                    'id_pasien'    => $faker->numberBetween(1, 20)
                ],
                [
                    'no_registrasi' => $faker->numerify('##########'),
                    'tgl_masuk' => $faker->date('Y_m_d'),
                    'tgl_keluar' => $faker->date('Y_m_d'),
                    'poliklinik' => 'Bedah Plastik',
                    'id_dokter'    => $faker->numberBetween(1, 20),
                    'id_pasien'    => $faker->numberBetween(1, 20)
                ],
                [
                    'no_registrasi' => $faker->numerify('##########'),
                    'tgl_masuk' => $faker->date('Y_m_d'),
                    'tgl_keluar' => $faker->date('Y_m_d'),
                    'poliklinik' => 'Bedah Ortophedi',
                    'id_dokter'    => $faker->numberBetween(1, 20),
                    'id_pasien'    => $faker->numberBetween(1, 20)
                ],
            ];
            $this->db->table('registrasi_perawatan')->insertBatch($data);
        }
    }
}
