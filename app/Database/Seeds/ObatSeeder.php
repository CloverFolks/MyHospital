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
        $kategori = array("Vitamin dan Suplemen", "Jantung", "Batuk dan Flu", "Saluran Pencernaan", "Demam", "Tulang dan Sendi", "Alergi", "Antibiotik", "Mata", "Kulit");
        $komposisi = array(
            "Omeprazole 20 mg",
            "Sea water 31.82 mL, purified water qsp 100 ",
            "Dexamethasone 1 mg, Neomycin sulphate 3.5 mg, Polymyxin B sulphate 10000 Si",
            "Carboxymethyl Cellulose Sodium 5 mg",
            "Furosemide 40 mg",
            "Tiap kapsul mengandung Fenofibrate 300 mg",
            "Acetylsalicylic acid 100 mg",
            "Cetirizine Hydrochloride 10 mg",
            "Chlorphenirramine maleate",
            "Diclofenac diethylamine 1%",
            "Vitamin D3 400 IU",
            "Placenta extract 10% dan Neomycin sulfate 0.5%.",
            "Per gram : Na fusidate 20 mg",
            "Setiap 100 gram mengandung 20.000 IU Sodium Heparin.",
            "Metformin HCl 500 mg",
            "Acetylsalicylic acid 80 mg",
            "Serbuk krim nabati, Dekstrosa, Campuran bakteri laktat (Lactobacillus Acidophilus, Bifidobacterium Longum, Streptococcus Thermophillus), Vitamin C, Vitamin B1, Vitamin B2, Vitamin B6, Niacin, Zinc",
            "Per 5 mL sirup : Sucralfate 500 mg",
            "Lactobacillus Rhamnosus R0011 1.9 x 1000.000.000 CFU, Lactobacillus Acidophillus R0052 0.1 x 1000.000.000 CFU",
            "Asam Mefenamat 500 mg",
            "Meloxicam 15 mg",
            "Clindamycin 300 mg",
            "Metronidazole 500 mg",
            "Levofloxacin 500 mg",
            "Doxycycline 100 mg",
            "Setiap tablet mengandung Paracetamol 500 mg",
            "Paracetamol 500 mg, Phenylpropanolamine HCl 12.5 mg, Chlorpheniramine Maleate 2 mg, Dextromethorphan HBr 15 mg",
            "Ambroxol 30 mg",
            "Tiap 5 mL (1 sendok takar) sirup mengandung : Succus Liquiritiae Extract 167 mg, Paracetamol 150 mg.",
            "Ammonium Chloride 50 mg, Ephedrine HCl 2.5 mg, Chlorpheniramine Maleate 1 mg.",
        );
        $aturan_pakai = array("Dikonsumsi sebelum makan", "Teteskan pada kantung konjungtiva", "Semprotkan pada tiap lubang hidung. Lama penyemprotan 1-2 detik. Bersihkan nosel dengan air hangat setelah digunakan dan keringkan", "Teteskan pada mata yang sakit", "Sebelum atau sesudah makan", "Sebelum atau sesudah makan. Dapat diberikan bersama makanan untuk mengurangi rasa tidak nyaman pada gastrointestinal", "Sebaiknya diminum bersama makanan, untuk dosis 1 x sehari diberikan bersama makan malam", "Sesudah makan");
        $kontra_indikasi = array(
            "Omeprazole dikontraindikasikan untuk pasien yang diketahui hipersensitivitas terhadap obat ini atau bahan lain yang terdapat dalam formulasi",
            "Hipersensitif, infeksi jamur sistemik, glaukoma, simplex keratitis", "Memiliki riwayat hipersensitivitas atau alergi terhadap kandungan obat ini", "Obat ini tidak boleh diberikan kepada pasien dengan kondisi: Hipersensitif terhadap Furosemide dan Sulfonamide"
        );

        for ($i = 0; $i < 30; $i++) {
            $data = [
                'kode' => $faker->unique()->ean13(),
                'nama_obat' => $nama_obat[$i],
                'jenis_obat' => $faker->randomElement($jenis_obat),
                'label_obat' => $faker->randomElement($label_obat),
                'produsen' => $faker->company(),
                'kategori' => $faker->randomElement($kategori),
                'komposisi' => $komposisi[$i],
                'aturan_pakai' => $faker->randomElement($aturan_pakai),
                'kontra_indikasi' => $faker->randomElement($kontra_indikasi),
                'no_bpom' => $faker->bothify('??#########')
            ];
            $this->db->table('obat')->insert($data);
        }
    }
}
