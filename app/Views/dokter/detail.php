<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mx-3 mb-3">
        <div class="col">
            <a class="btn mb-1" href="<?= base_url('/dokter'); ?>"><i data-feather="arrow-left"></i> Kembali</a>
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
                                <li><a class="dropdown-item" href="<?= base_url('/dokter/edit/' . $dokter['id']); ?>"><i data-feather="edit"></i> Edit data</a></li>
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalHapus"><i data-feather="trash-2"></i> Hapus data</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- menampilkan modal hapus -->
                <div class="modal fade" id="modalHapus" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Hapus Data Dokter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Anda yakin ingin menghapus data dokter ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a type="button" href="/dokter/delete/<?= $dokter['id']; ?>" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th rowspan="11" scope="row">Biodata Dokter</th>
                        </tr>
                        <?php
                        $image = $dokter['image_profile'];
                        if ($image == '') {
                            $image = 'default.jpg';
                        } else {
                            $image = $dokter['image_profile'];
                        }

                        ?>
                        <tr>
                            <td><img src="/images/avatar/<?= $image; ?>" alt="" class="image" style="width: 150px;"></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td><?= $dokter['nik']; ?></td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td><?= $dokter['nip']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><?= $dokter['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Izin Praktek</td>
                            <td><?= $dokter['izin_praktek']; ?></td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td><?= $dokter['no_hp']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= $dokter['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?= ($dokter['jenis_kelamin']) ? 'Laki-laki' : 'Perempuan'; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Mulai Bekerja</td>
                            <td><?= $dokter['tgl_mulai_bekerja']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $dokter['alamat']; ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>