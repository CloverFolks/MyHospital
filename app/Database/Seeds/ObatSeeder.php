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
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'kode' => $faker->bothify('???#########?#'),
                'nama_obat' => $faker->word(),
                'produsen' => $faker->company(),
            ];
            $this->db->table('obat')->insert($data);
        }
    }
}
