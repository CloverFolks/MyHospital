<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Provider\bg_BG\PhoneNumber;
use Faker\Provider\en_US\Company;

class PemberianTindakanSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $tindakan = array('Pemberian suntikan penenang', 'Pemeriksaan pasca operasi', 'Pemberian konseling', 'Konsultasi hasil pemeriksaan', 'Pemeriksaan suhu tubuh', 'Pemasangan ventilator', 'Konsultasi diagnosis awal', 'Pemeriksaan kejiwaan pasien', 'Pemeriksaan darah lengkap', 'Pemeriksaan tingkat sedimentasi eritrosit', 'Uji protein C – reaktif', 'Pengujian elektrolit darah', 'Analisis gas darah', 'Pemeriksaan fungsi tiroid', 'Pemeriksaan tingkat kolesterol', 'Pemeriksaan gula darah', 'Cek tekanan darah', 'Pemeriksaan fungsi paru');

        for ($i = 0; $i < 350; $i++) {
            $data = [
                'nama_tindakan' => $faker->randomElement($tindakan),
                'biaya' => $faker->numerify('###000'),
                'id_dokter' => $faker->numberBetween(1, 40),
                'id_registrasi_perawatan' => $faker->numberBetween(1, 100),
                'metode_pembayaran' => $faker->creditCardType(),
                'tanggal' => Time::createFromTimestamp($faker->numberBetween(1550000000, time()))
            ];
            $this->db->table('pemberian_tindakan')->insert($data);
        }
    }
}
