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

        for ($i = 0; $i < 40; $i++) {
            $suffix = array('Sp PD', 'Sp A', 'M. Kes', 'M. Sc', 'Sp B', 'M. Si', 'Sp. OG', 'Sp P', 'Sp THT-KL', 'Sp PK', 'Sp PA', 'Sp Rad', 'Sp M.K.', 'Sp An', 'Sp KJ');

            $gender = $faker->boolean();
            $genderString = ($gender) ? 'male' : 'female';
            $firstName = $faker->firstName($genderString);
            $lastName = $faker->lastName($genderString);
            $name = 'dr. ' . $firstName . ' ' . $lastName . ', ' . $faker->randomElement($suffix);
            $email = strtolower(substr($firstName, 0, 1)  . $lastName . '@myhospital.com');

            $data = [
                'nik' => $faker->nik(),
                'nip' => $faker->unique()->randomNumber(4, true),
                'nama' => $name,
                'email'    => $email,
                'alamat' => $faker->address(),
                'jenis_kelamin' => $gender,
                'image_profile' => '',
                'izin_praktek' => strtoupper($faker->bothify('###/????/???/#/200#')),
                'tgl_mulai_bekerja' => $faker->date('Y_m_d'),
                'no_hp' => $faker->phoneNumber,
            ];
            $this->db->table('dokter')->insert($data);
        }
    }
}
