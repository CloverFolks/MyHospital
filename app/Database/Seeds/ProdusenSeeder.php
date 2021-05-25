<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Provider\bg_BG\PhoneNumber;
use Faker\Provider\en_US\Company;

class ProdusenSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 30; $i++) {
            $nama_produsen = array("PT Kalbe Farma Tbk.", "PT Kimia Farma Tbk.", "PT Afifarma", "PT Bayer Indonesia Tbk", "PT Combiphar Farma", "PT Darya Varia Laboratoria", "PT Samco Farma", "PT Zenith Pharmaceutical", "PT Medifarma Laboratories", "PT Ifars Pharmaceutical & Lab");

            $data = [
                'nama_produsen' => $faker->randomElement($nama_produsen),
                'alamat' => $faker->address(),
                'tanggal_berdiri' => $faker->date('Y_m_d'),
                'telepon' => $faker->phoneNumber,
                'email'    => $faker->companyEmail(),
                'pabrik' => $faker->address(),
                'website' => $faker->domainName()
            ];
            $this->db->table('produsen')->insert($data);
        }
    }
}
