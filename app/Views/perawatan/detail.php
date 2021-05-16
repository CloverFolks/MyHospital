<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mx-3 mb-3">
        <div class="col">
            <a class="btn mb-1" href="<?= base_url('/perawatan'); ?>"><i data-feather="arrow-left"></i> Kembali</a>
            <h1 class="inline"><?= $title; ?></h1>
        </div>
    </div>

    <div class="card p-4">
        <div class="row mb-3">
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                        <i data-feather="settings"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('/perawatan/edit/' . $perawatan['id']); ?>"><i data-feather="edit"></i> Edit data</a></li>
                        <li><a class="dropdown-item" href="#"><i data-feather="trash-2"></i> Hapus data</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <tbody>
                        <tr>
                            <th rowspan="5" scope="row">Perawatan</th>
                        </tr>
                        <tr>
                            <td>No. Registrasi</td>
                            <td><?= $perawatan['no_registrasi']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td><?= $perawatan['tgl_masuk']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Keluar</td>
                            <td><?= ($perawatan['tgl_keluar']) ? $perawatan['tgl_keluar'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Poliklinik</td>
                            <td><?= $perawatan['poliklinik']; ?></td>
                        </tr>

                        <tr>
                            <th rowspan="8" scope="row">Pasien</th>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td><?= $pasien['nik']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Rekam Medis</td>
                            <td><?= $pasien['no_rekam_medis']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><?= $pasien['nama_pasien']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?= ($pasien['jenis_kelamin']) ? 'Laki-laki' : 'Perempuan'; ?></td>
                        </tr>
                        <tr>
                            <td>Golongan Darah</td>
                            <td><?= $pasien['golongan_darah']; ?></td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td>
                                <?php
                                $dob = new DateTime($pasien['tgl_lahir']);
                                $now = new DateTime();
                                $umur = $now->diff($dob);
                                echo $umur->y . ' tahun';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><?= $pasien['tgl_lahir']; ?></td>
                        </tr>

                        <tr>
                            <th rowspan="5" scope="row">Dokter</th>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td><?= $dokter['nik']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><?= $dokter['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Izin Praktik</td>
                            <td><?= $dokter['izin_praktek']; ?></td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td><?= $dokter['no_hp']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card p-4">
                <h5>Riwayat Pemberian Tindakan</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tindakan</th>
                            <th scope="col">Biaya</th>
                            <th scope="col">Metode Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!$riwayatTindakan) : ?>
                            <tr>
                                <td colspan="5"><i>Belum ada riwayat pemberian tindakan.</i></td>
                            </tr>
                        <?php endif; ?>

                        <?php $i = 1; ?>
                        <?php foreach ($riwayatTindakan as $tindakan) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $tindakan['tanggal']; ?></td>
                                <td><?= $tindakan['nama_tindakan']; ?></td>
                                <td><?= 'Rp' . number_format($tindakan['biaya'], 0, ',', '.'); ?></td>
                                <td><?= $tindakan['metode_pembayaran']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-success"><i data-feather="plus-circle"></i> Tambah data</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card p-4">
                <h5>Riwayat Pemberian Obat</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Biaya</th>
                            <th scope="col">Metode Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!$riwayatObat) : ?>
                            <tr>
                                <td colspan="7"><i>Belum ada riwayat pemberian obat.</i></td>
                            </tr>
                        <?php endif; ?>

                        <?php $i = 1; ?>
                        <?php foreach ($riwayatObat as $obat) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $obat['tanggal']; ?></td>
                                <td><?= $obat['kode']; ?></td>
                                <td><?= $obat['nama_obat']; ?></td>
                                <td><?= $obat['kuantitas']; ?></td>
                                <td><?= 'Rp' . number_format($obat['biaya'], 0, ',', '.'); ?></td>
                                <td><?= $obat['metode_pembayaran']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-success"><i data-feather="plus-circle"></i> Tambah data</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>