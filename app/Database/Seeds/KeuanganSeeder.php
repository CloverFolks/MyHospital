<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Provider\bg_BG\PhoneNumber;

class KeuanganSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $tindakan = array('Pemberian suntikan penenang', 'Pemeriksaan pasca operasi', 'Pemberian konseling', 'Konsultasi hasil pemeriksaan', 'Pemeriksaan suhu tubuh', 'Pemasangan ventilator', 'Konsultasi diagnosis awal', 'Pemeriksaan kejiwaan pasien', 'Pemeriksaan darah lengkap', 'Pemeriksaan tingkat sedimentasi eritrosit', 'Uji protein C – reaktif', 'Pengujian elektrolit darah', 'Analisis gas darah', 'Pemeriksaan fungsi tiroid', 'Pemeriksaan tingkat kolesterol', 'Pemeriksaan gula darah', 'Cek tekanan darah', 'Pemeriksaan fungsi paru');

        for ($i = 0; $i < 100; $i++) {
            $penerimaan = array("pembayaran pembelian obat " . $faker->randomNumber(4, true), "biaya sewa ruang " . $faker->randomNumber(4, true), "pembayaran " . $faker->randomElement($tindakan));

            $pengeluaran = array(
                "pengadaan obat " . $faker->randomNumber(4, true) . " dari produsen " . $faker->randomNumber(4, true), "pembayaran gaji " . $faker->randomNumber(4, true), "pembayaran tagihan " . $faker->randomNumber(4, true), "Pengeluaran pengadaan alat " . $faker->randomNumber(4, true)
            );

            $keterangan = "";
            $jumlah = $faker->randomNumber(5);

            if ($faker->boolean()) {
                $jumlah *= 1000;
                $keterangan .= "Penerimaan " . $faker->randomElement($penerimaan);
            } else {
                $jumlah *= -1000;
                $keterangan .= "Pengeluaran " . $faker->randomElement($pengeluaran);
            }

            $keterangan = ucfirst(strtolower($keterangan));

            $data = [
                'keterangan' => $keterangan,
                'jumlah' => $jumlah
            ];
            $this->db->table('keuangan')->insert($data);
        }
    }
}
