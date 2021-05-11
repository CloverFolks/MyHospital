<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Provider\bg_BG\PhoneNumber;
use Faker\Provider\en_US\Company;

class PemberianObatSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'id_obat' => $faker->numberBetween(1, 20),
                'kuantitas' => $faker->numberBetween(1, 10),
                'tanggal' => $faker->date('Y_m_d'),
                'id_registrasi_perawatan' => $faker->numberBetween(1, 5),
                'biaya' => $faker->numerify('###000'),
                'metode_pembayaran'    => $faker->creditCardType(),
            ];
            $this->db->table('pemberian_obat')->insert($data);
        }
    }
}
