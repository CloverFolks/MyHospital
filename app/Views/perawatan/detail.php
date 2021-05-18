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
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i data-feather="settings"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('/perawatan/edit/' . $perawatan['id']); ?>"><i data-feather="edit"></i> Edit data</a></li>
                        <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalHapusPerawatan"><i data-feather="trash-2"></i> Hapus data</button></li>
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
                            <th rowspan="8" scope="row">
                                Pasien
                            </th>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td><?= ($perawatan['nik']); ?></td>
                        </tr>
                        <tr>
                            <td>No. Rekam Medis</td>
                            <td><?= $perawatan['no_rekam_medis']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><?= $perawatan['nama_pasien']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?= ($perawatan['jenis_kelamin']) ? 'Laki-laki' : 'Perempuan'; ?></td>
                        </tr>
                        <tr>
                            <td>Golongan Darah</td>
                            <td><?= $perawatan['golongan_darah']; ?></td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td>
                                <?php
                                $dob = new DateTime($perawatan['tgl_lahir']);
                                $now = new DateTime();
                                $umur = $now->diff($dob);
                                echo $umur->y . ' tahun';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><?= $perawatan['tgl_lahir']; ?></td>
                        </tr>

                        <tr>
                            <th rowspan="5" scope="row">
                                Dokter
                            </th>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td><?= $perawatan['nip']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><?= $perawatan['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Izin Praktik</td>
                            <td><?= $perawatan['izin_praktek']; ?></td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td><?= $perawatan['no_hp']; ?></td>
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
                            <th scope="col">Dokter</th>
                            <th scope="col">Tindakan</th>
                            <th scope="col">Biaya</th>
                            <th scope="col">Aksi</th>
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
                                <td><?= $tindakan['nama']; ?></td>
                                <td><?= $tindakan['nama_tindakan']; ?></td>
                                <td><?= 'Rp' . number_format($tindakan['biaya'], 0, ',', '.'); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button onclick="populateFormTindakan(<?= $tindakan['id']; ?>)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditRiwayatTindakan"><i data-feather="edit"></i> Edit</a></button></li>
                                            <li><button type="button" onclick="hapusTindakan(<?= $tindakan['id']; ?>)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalHapusPemberianTindakan"><i data-feather="trash-2"></i> Hapus</button></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahRiwayatTindakan"><i data-feather="plus-circle"></i> Tambah data</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahRiwayatTindakan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data pemberian tindakan</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal"></button>
                </div>
                <form id="formTindakan" action="<?= base_url('/perawatan/savePemberianTindakan'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input id="tindakan-id" type="hidden" name="tindakan_id_perawatan" value="<?= $perawatan['id']; ?>">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input name="tindakan_tanggal" type="date" class="form-control" id="formTindakanTanggal" placeholder="0" required>
                            <label for="formTindakanTanggal">Tanggal</label>
                        </div>

                        <div class="input-group mb-3">
                            <input id="dokter-nip" type="number" class="form-control" placeholder="NIP Dokter" required>
                            <button id="btn-search-dokter" class="btn btn-outline-secondary" type="button"><i data-feather="search"></i></button>
                        </div>

                        <input name="tindakan_id_dokter" id="dokter-id" class="visually-hidden" required>

                        <input id="dokter-nama" type="text" class="form-control mb-3" placeholder="Nama dokter" disabled>

                        <div class="form-floating mb-3">
                            <textarea name="tindakan_nama" id="formTindakanNama" class="form-control" placeholder="Masukkan deskripsi tindakan" style="height: 100px" required></textarea>
                            <label for="formTindakanNama">Tindakan</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="tindakan_biaya" type="number" class="form-control" id="formTindakanBiaya" placeholder="0" required>
                            <label for="formTindakanBiaya">Biaya</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="tindakan_metode_pembayaran" type="text" class="form-control" id="formTindakanMetodePembayaran" placeholder="0" required>
                            <label for="formTindakanMetodePembayaran">Metode Pembayaran</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-close-modal btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditRiwayatTindakan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit data pemberian tindakan</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal"></button>
                </div>
                <form id="formEditTindakan" action="" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="tindakan_id_perawatan" value="<?= $perawatan['id']; ?>">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input name="tindakan_tanggal" type="date" class="form-control" id="formEditTindakanTanggal" placeholder="0" required>
                            <label for="formEditTindakanTanggal">Tanggal</label>
                        </div>

                        <div class="input-group mb-3">
                            <input id="formEditTindakanDokterNip" type="number" class="form-control" placeholder="NIP Dokter" required>
                            <button id="btn-search-dokter" class="btn btn-outline-secondary" type="button"><i data-feather="search"></i></button>
                        </div>

                        <input name="tindakan_id_dokter" id="formEditTindakanDokterId" class="visually-hidden" required>

                        <input id="formEditTindakanDokterNama" type="text" class="form-control mb-3" placeholder="Nama dokter" disabled>

                        <div class="form-floating mb-3">
                            <textarea name="tindakan_nama" id="formEditTindakanNama" class="form-control" placeholder="Masukkan deskripsi tindakan" style="height: 100px" required></textarea>
                            <label for="formEditTindakanNama">Tindakan</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="tindakan_biaya" type="number" class="form-control" id="formEditTindakanBiaya" placeholder="0" required>
                            <label for="formEditTindakanBiaya">Biaya</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="tindakan_metode_pembayaran" type="text" class="form-control" id="formEditTindakanMetodePembayaran" placeholder="0" required>
                            <label for="formEditTindakanMetodePembayaran">Metode Pembayaran</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-close-modal btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                    </div>
                </form>
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
                            <th scope="col">Aksi</th>
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
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button onclick="populateFormPemberianObat(<?= $obat['id']; ?>)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditRiwayatObat"><i data-feather="edit"></i> Edit</a></button></li>
                                            <li><button type="button" onclick="hapusPemberianObat(<?= $obat['id']; ?>)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalHapusPemberianObat"><i data-feather="trash-2"></i> Hapus</button></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button id="btn-modal-tindakan" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahRiwayatObat"><i data-feather="plus-circle"></i> Tambah data</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahRiwayatObat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data pemberian obat</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal"></button>
                </div>
                <form id="formObat" action="<?= base_url('/perawatan/savePemberianObat'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input id="pemberian-obat-id" type="hidden" name="obat_id_perawatan" value="<?= $perawatan['id']; ?>">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input name="obat_tanggal" type="date" class="form-control" id="formObatTanggal" placeholder="0" required>
                            <label for="formObatTanggal">Tanggal</label>
                        </div>

                        <div class="input-group mb-3">
                            <input id="obat-kode" type="number" class="form-control" placeholder="Kode Obat" required>
                            <button id="btn-search-obat" class="btn btn-outline-secondary" type="button"><i data-feather="search"></i></button>
                        </div>

                        <input name="obat_id_obat" id="obat-id" class="visually-hidden" required>

                        <input id="obat-nama" type="text" class="form-control mb-3" placeholder="Nama obat" disabled>

                        <div class="form-floating mb-3">
                            <input name="obat_kuantitas" type="number" class="form-control" id="formObatKuantitas" placeholder="0" required>
                            <label for="formObatKuantitas">Kuantitas</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="obat_biaya" type="number" class="form-control" id="formObatBiaya" placeholder="0" required>
                            <label for="formObatBiaya">Biaya</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="obat_metode_pembayaran" type="text" class="form-control" id="formObatMetodePembayaran" placeholder="0" required>
                            <label for="formObatMetodePembayaran">Metode Pembayaran</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-close-modal btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditRiwayatObat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit data pemberian obat</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal"></button>
                </div>
                <form id="formEditPemberianObat" action="" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="obat_id_perawatan" value="<?= $perawatan['id']; ?>">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input name="obat_tanggal" type="date" class="form-control" id="formEditPemberianObatTanggal" placeholder="0" required>
                            <label for="formEditPemberianObatTanggal">Tanggal</label>
                        </div>

                        <div class="input-group mb-3">
                            <input id="formEditPemberianObatKodeObat" type="number" class="form-control" placeholder="Kode Obat" required>
                            <button id="btn-search-obat" class="btn btn-outline-secondary" type="button"><i data-feather="search"></i></button>
                        </div>

                        <input name="obat_id_obat" id="formEditPemberianObatIdObat" class="visually-hidden" required>

                        <input id="formEditPemberianObatNama" type="text" class="form-control mb-3" placeholder="Nama obat" disabled>

                        <div class="form-floating mb-3">
                            <input name="obat_kuantitas" type="number" class="form-control" id="formEditPemberianObatKuantitas" placeholder="0" required>
                            <label for="formEditPemberianObatKuantitas">Kuantitas</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="obat_biaya" type="number" class="form-control" id="formEditPemberianObatBiaya" placeholder="0" required>
                            <label for="formEditPemberianObatBiaya">Biaya</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="obat_metode_pembayaran" type="text" class="form-control" id="formEditPemberianObatMetodePembayaran" placeholder="0" required>
                            <label for="formEditPemberianObatMetodePembayaran">Metode Pembayaran</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-close-modal btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapusPerawatan" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah yakin ingin menghapus data perawatan ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="<?= base_url('/perawatan/delete/' . $perawatan['id']); ?>" method="POST" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapusPemberianTindakan" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah yakin ingin menghapus data pemberian tindakan ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="<?= base_url('/perawatan/deletePemberianTindakan'); ?>" method="POST" class="d-inline">
                    <?= csrf_field(); ?>
                    <input id="formHapusPemberianTindakanId" type="hidden" name="id_tindakan" value="">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapusPemberianObat" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah yakin ingin menghapus data pemberian obat ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="<?= base_url('/perawatan/deletePemberianObat'); ?>" method="POST" class="d-inline">
                    <?= csrf_field(); ?>
                    <input id="formHapusPemberianObatId" type="hidden" name="id_pemberian_obat" value="">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $("#btn-search-dokter").click(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('perawatan/findDokterByNip'); ?>",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: {
                nip: $("#dokter-nip").val()
            },
            success: function(result) {
                try {
                    let dokter = JSON.parse(result);
                    $("#dokter-nip").removeClass('is-invalid');
                    $("#dokter-id").val(dokter.id);
                    $("#dokter-nama").val(dokter.nama);
                } catch (error) {
                    $("#dokter-nip").addClass('is-invalid');
                    $("#dokter-id").val('');
                    $("#dokter-nama").val('Dokter tidak ditemukan');
                }
            }
        })
    });

    $("#btn-search-obat").click(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('perawatan/findObatByKode'); ?>",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: {
                kode: $("#obat-kode").val()
            },
            success: function(result) {
                try {
                    let obat = JSON.parse(result);
                    $("#obat-kode").removeClass('is-invalid');
                    $("#obat-id").val(obat.id);
                    $("#obat-nama").val(obat.nama_obat);
                } catch (error) {
                    $("#obat-kode").addClass('is-invalid');
                    $("#obat-id").val('');
                    $("#obat-nama").val('Obat tidak ditemukan');
                }
            }
        })
    });

    function populateFormTindakan(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('perawatan/findPemberianTindakanById'); ?>",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: {
                id: id
            },
            success: function(result) {
                try {
                    let tindakan = JSON.parse(result).tindakan;
                    let dokter = JSON.parse(result).dokter;
                    $('#formEditTindakan').attr('action', '<?= base_url('/perawatan/savePemberianTindakan'); ?>/' + tindakan.id);
                    $('#formEditTindakanTanggal').val(tindakan.tanggal);
                    $('#formEditTindakanDokterNip').val(dokter.nip);
                    $('#formEditTindakanDokterId').val(dokter.id);
                    $('#formEditTindakanDokterNama').val(dokter.nama);
                    $('#formEditTindakanNama').val(tindakan.nama_tindakan);
                    $('#formEditTindakanBiaya').val(tindakan.biaya);
                    $('#formEditTindakanMetodePembayaran').val(tindakan.metode_pembayaran);
                } catch (error) {
                    console.log(error);
                }
            }
        })
    }

    function populateFormPemberianObat(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('perawatan/findPemberianObatById'); ?>",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: {
                id: id
            },
            success: function(result) {
                try {
                    let pemberianObat = JSON.parse(result).pemberianObat;
                    let obat = JSON.parse(result).obat;
                    $('#formEditPemberianObat').attr('action', '<?= base_url('/perawatan/savePemberianObat'); ?>/' + pemberianObat.id);
                    $('#formEditPemberianObatTanggal').val(pemberianObat.tanggal);
                    $('#formEditPemberianObatKodeObat').val(obat.kode);
                    $('#formEditPemberianObatIdObat').val(pemberianObat.id_obat);
                    $('#formEditPemberianObatNama').val(obat.nama_obat);
                    $('#formEditPemberianObatKuantitas').val(pemberianObat.kuantitas);
                    $('#formEditPemberianObatBiaya').val(pemberianObat.biaya);
                    $('#formEditPemberianObatMetodePembayaran').val(pemberianObat.metode_pembayaran);
                } catch (error) {
                    console.log(error);
                }
            }
        })
    }

    function hapusTindakan(id) {
        $('#formHapusPemberianTindakanId').val(id);
    }

    function hapusPemberianObat(id) {
        $('#formHapusPemberianObatId').val(id);
    }
</script>

<?= $this->endSection(); ?>