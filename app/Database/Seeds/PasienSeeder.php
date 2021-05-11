<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Provider\bg_BG\PhoneNumber;
use Faker\Provider\en_US\Company;

class PasienSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'image_profile' => $faker->numerify('#.jpg'),
                'no_rekam_medis' => $faker->numerify('##-##-##'),
                'nama_pasien' => $faker->name(),
                'pekerjaan'    => $faker->jobTitle(),
                'no_hp' => $faker->phoneNumber(),
                'alamat' => $faker->address(),
                'jenis_kelamin' => $faker->boolean(),
                'golongan_darah' => $faker->bloodType(),
                'tgl_lahir' => $faker->date('Y_m_d'),
                'status_menikah' => $faker->boolean(),


            ];
            $this->db->table('pasien')->insert($data);
        }
    }
}
