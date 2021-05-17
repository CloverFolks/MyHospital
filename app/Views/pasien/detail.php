<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mx-3 mb-3">
        <div class="col">
            <a class="btn mb-1" href="<?= base_url('/pasien'); ?>"><i data-feather="arrow-left"></i> Kembali</a>
            <h1 class="inline"><?= $title; ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card p-4">
                <div class="row mb-3">
                    <div class="col">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <i data-feather="settings"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('/pasien/edit/' . $pasien['id']); ?>"><i data-feather="edit"></i> Edit data</a></li>
                                <li><a class="dropdown-item" href="/pasien/delete/<?= $pasien['id']; ?>"><i data-feather="trash-2"></i> Hapus data</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th rowspan="12" scope="row">Biodata pasien</th>
                        </tr>

                        <tr>
                            <td><img src="/images/avatar/<?= $pasien['image_profile']; ?>" alt="" class="image" style="width: 150px;"></td>
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
                            <td>Nama</td>
                            <td><?= $pasien['nama_pasien']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><?= $pasien['tgl_lahir']; ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td><?= $pasien['pekerjaan']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Handphone</td>
                            <td><?= $pasien['no_hp']; ?></td>
                        </tr>
                        <tr>
                            <td>Golongan Darah</td>
                            <td><?= $pasien['golongan_darah']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?= ($pasien['jenis_kelamin']) ? 'Laki-laki' : 'Perempuan'; ?></td>
                        </tr>
                        <tr>
                            <td>Status Menikah</td>
                            <td><?= ($pasien['status_menikah']) ? 'Sudah Menikah' : 'Belum Menikah'; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $pasien['alamat']; ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>