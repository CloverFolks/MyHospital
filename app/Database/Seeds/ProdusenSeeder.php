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

        $nama_produsen = array(
            "PT Kalbe Farma Tbk.",
            "PT Kimia Farma Tbk.",
            "PT Afifarma",
            "PT Bayer Indonesia Tbk",
            "PT Combiphar Farma",
            "PT Darya Varia Laboratoria",
            "PT Samco Farma", "PT Zenith Pharmaceutical",
            "PT Medifarma Laboratories",
            "PT Ifars Pharmaceutical & Lab",
            "PT Bio Farma",
            "PT Nellco Indopharma",
            "PT Phapros",
            "PT Lapi Laboratories",
            "PT Mersifarma Tirmaku Mercusana",
            "PT Graha Farma",
            "PT Henson Farma",
            "PT Samco Farma",
            "PT Combiphar Farma",
            "PT Emba Megafarma",
            "PT Errita Pharma"
        );

        for ($i = 0; $i < 20; $i++) {
            $data = [
                'kode_produsen' => $faker->unique()->numerify('#######'),
                'nama_produsen' => $nama_produsen[$i],
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
