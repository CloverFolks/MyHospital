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
        $nama_obat = array("Ibuprofen", "Alprazolam", "Antidepresan", "Glukagon", "Feminax", "Bisolvon", "Captopril", "Cefprozil", "Combantrin", "Diapet", "Dexanta", "Dopamin", "Entrostop", "Estrogen", "Enervon C", "Heparin", "Imboost", "Lanolin", "MAOI", "Oralit", "Duloxetine", "Verile", "Vaksin Siinovac", "Tramadol", "Sulfonamida", "Quinidine", "Ponstan", "Oxycodone", "Nystatin", "Morfin");
        $jenis_obat = array("Pulvis", "Pulveres", "Compressi", "Pilulae", "Solutiones", "Suspensiones", "Elmusiones", "Galenik", "Extractum", "Infusa", "Immunosera", "Unguenta", "Suppositoria", "Guttae", "Injectiones");
        $label_obat = array("Herbal Tradisional", "Herbal Terstandar", "Fitofarmaka", "Beredar Bebas", "Bebas Terbatas", "Obat Keras", "Narkotika");

        for ($i = 0; $i < 30; $i++) {
            $data = [
                'kode' => $faker->unique()->ean13(),
                'nama_obat' => $nama_obat[$i],
                'jenis_obat' => $faker->randomElement($jenis_obat),
                'label_obat' => $faker->randomElement($label_obat),
                'produsen' => $faker->company(),
                'no_bpom' => $faker->bothify('??#########'),
                'tgl_produksi' => $faker->date('Y_m_d'),
                'tgl_kedaluwarsa' => $faker->date('Y_m_d'),
            ];
            $this->db->table('obat')->insert($data);
        }
    }
}
