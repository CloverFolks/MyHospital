<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Provider\bg_BG\PhoneNumber;
use Faker\Provider\en_US\Company;

class ObatSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $suffix = array('an', 'at', 'ol', 'or', 'in', 'line', 'ida', 'nia', 'en', 'tyl', 'am');

        for ($i = 0; $i < 20; $i++) {
            $nama = $faker->words($faker->numberBetween(1, 2), true) . $faker->randomElement($suffix);
            $data = [
                'kode' => $faker->unique()->ean13(),
                'nama_obat' => ucwords($nama),
                'produsen' => $faker->company(),
            ];
            $this->db->table('obat')->insert($data);
        }
    }
}
