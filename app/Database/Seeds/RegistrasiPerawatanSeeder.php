<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Provider\bg_BG\PhoneNumber;

class RegistrasiPerawatanSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $poliklinik = array("Bedah", "Penyakit Dalam", "Obstetri dan Ginekologi", "Anak", "Jantung", "Syaraf", "THT", "Mata", "Paru", "TB-MDR", "Anestesiologi", "DOTS TB", "Gigi", "Dokter Gigi Spesialis", "Psikologi", "Tumbuh Kembang Anak", "Kulit dan Kelamin");

        for ($i = 0; $i < 100; $i++) {
            $timeKeluar = $faker->numberBetween(1550000000, time());
            $duration = $faker->numberBetween(86400, 60 * 86400);
            $timeMasuk = $timeKeluar - $duration;
            $data = [
                'no_registrasi' => $faker->unique()->numerify('##########'),
                'tgl_masuk'     => Time::createFromTimestamp($timeMasuk),
                'tgl_keluar'    => Time::createFromTimestamp($timeKeluar),
                'poliklinik'    => $poliklinik[$faker->numberBetween(0, 16)],
                'id_dokter'     => $faker->numberBetween(1, 20),
                'id_pasien'     => $faker->numberBetween(1, 20)
            ];
            $this->db->table('registrasi_perawatan')->insert($data);
        }
    }
}
