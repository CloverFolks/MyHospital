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
        $faker2 = \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $gender = $faker->boolean();
            $data = [
                'nik' => $faker->unique()->nik(),
                'image_profile' => '',
                'no_rekam_medis' => $faker->numerify('####-##-##'),
                'nama_pasien' => $faker->name(($gender) ? 'male' : 'female'),
                'pekerjaan'    => $faker2->jobTitle(),
                'no_hp' => $faker->phoneNumber(),
                'alamat' => $faker->address(),
                'jenis_kelamin' => $gender,
                'golongan_darah' => $faker->bloodType(),
                'tgl_lahir' => $faker->date('Y_m_d'),
                'status_menikah' => $faker->boolean(),
            ];
            $this->db->table('pasien')->insert($data);
        }
    }
}
