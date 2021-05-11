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
        $data = [
            [
                'nama_tindakan' => 'Pemberian Obat',
                'biaya' => $faker->numerify('###000'),
                'id_dokter' => $faker->numberBetween(1, 20),
                'id_registrasi_perawatan' => $faker->numberBetween(1, 5),
                'metode_pembayaran'    => $faker->creditCardType(),
                'tanggal' => $faker->date('Y_m_d'),
            ], [
                'nama_tindakan' => 'Pengecekan Pasca Operasi',
                'biaya' => $faker->numerify('###000'),
                'id_dokter' => $faker->numberBetween(1, 20),
                'id_registrasi_perawatan' => $faker->numberBetween(1, 5),
                'metode_pembayaran'    => $faker->creditCardType(),
                'tanggal' => $faker->date('Y_m_d'),
            ], [
                'nama_tindakan' => 'Pemeriksaan Darah',
                'biaya' => $faker->numerify('###000'),
                'id_dokter' => $faker->numberBetween(1, 20),
                'id_registrasi_perawatan' => $faker->numberBetween(1, 5),
                'metode_pembayaran'    => $faker->creditCardType(),
                'tanggal' => $faker->date('Y_m_d'),
            ], [
                'nama_tindakan' => 'Pengukuran Tensi',
                'biaya' => $faker->numerify('###000'),
                'id_dokter' => $faker->numberBetween(1, 20),
                'id_registrasi_perawatan' => $faker->numberBetween(1, 5),
                'metode_pembayaran'    => $faker->creditCardType(),
                'tanggal' => $faker->date('Y_m_d'),
            ], [
                'nama_tindakan' => 'Pemeriksaan Perban',
                'biaya' => $faker->numerify('###000'),
                'id_dokter' => $faker->numberBetween(1, 20),
                'id_registrasi_perawatan' => $faker->numberBetween(1, 5),
                'metode_pembayaran'    => $faker->creditCardType(),
                'tanggal' => $faker->date('Y_m_d'),
            ],
        ];
        $this->db->table('pemberian_tindakan')->insertBatch($data);
    }
}
