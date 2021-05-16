<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Provider\bg_BG\PhoneNumber;

class DokterSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'nik' => $faker->nik(),
                'nip' => $faker->numerify('19################'),
                'nama' => $faker->name(),
                'email'    => $faker->freeEmail(),
                'alamat' => $faker->address(),
                'jenis_kelamin' => $faker->boolean(),
                'image_profile' => $faker->numerify('#.jpg'),
                'izin_praktek' => strtoupper($faker->bothify('###/????/???/#/200#')),
                'tgl_mulai_bekerja' => $faker->date('Y_m_d'),
                'no_hp' => $faker->phoneNumber(),
            ];
            $this->db->table('dokter')->insert($data);
        }
    }
}
