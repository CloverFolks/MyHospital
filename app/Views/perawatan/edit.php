<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mx-3 mb-3">
        <div class="col">
            <a class="btn mb-1" href="<?= base_url('/perawatan/detail/' . $perawatan['id']); ?>"><i data-feather="arrow-left"></i> Kembali</a>
            <h1 class="inline"><?= $title; ?></h1>
        </div>
    </div>

    <div class="card p-4">
        <div class="row">
            <div class="col">
                <form action="<?= base_url('/perawatan/save'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th rowspan="5" scope="row">Perawatan</th>
                            </tr>
                            <tr>
                                <td>No. Registrasi</td>
                                <td>
                                    <input name="no_registrasi" value="<?= $perawatan['no_registrasi']; ?>" type="hidden">
                                    <input type="text" placeholder="<?= $perawatan['no_registrasi']; ?>" class="form-control" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Masuk</td>
                                <td>
                                    <input name="tgl_masuk" value="<?= $perawatan['tgl_masuk']; ?>" type="date" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Keluar</td>
                                <td>
                                    <input name="tgl_keluar" value="<?= $perawatan['tgl_keluar']; ?>" type="date" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Poliklinik</td>
                                <td>
                                    <?php
                                    $poliklinik = array("Bedah", "Penyakit Dalam", "Obstetri dan Ginekologi", "Anak", "Jantung", "Syaraf", "THT", "Mata", "Paru", "TB-MDR", "Anestesiologi", "DOTS TB", "Gigi", "Dokter Gigi Spesialis", "Psikologi", "Tumbuh Kembang Anak", "Kulit dan Kelamin");
                                    ?>
                                    <select name="poliklinik" class="form-select" required>
                                        <option value="" disabled>Pilih poliklinik</option>
                                        <option value="Bedah">Bedah</option>
                                        <?php foreach ($poliklinik as $p) : ?>
                                            <option value="<?= $p; ?>" <?= ($p == $perawatan['poliklinik']) ? 'selected' : ''; ?>><?= $p; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th rowspan="7" scope="row">
                                    Pasien
                                    <br>
                                    <br>
                                    <a class="btn btn-outline-success" href="<?= base_url('/pasien/edit/' . $pasien['id']); ?>" target="_blank">
                                        <i data-feather="edit"></i> Edit
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>
                                    <div class="input-group">
                                        <input id="pasien-nik" value="<?= $pasien['nik']; ?>" type="text" class="form-control" required>
                                        <button id="btn-search-pasien" class="btn btn-outline-secondary" type="button"><i data-feather="search"></i></button>
                                    </div>
                                    <input name="id_pasien" value="<?= $pasien['id']; ?>" id="pasien-id" type="text" class="visually-hidden" required>
                                </td>
                            </tr>
                            <tr>
                                <td>No. Rekam Medis</td>
                                <td>
                                    <input id="pasien-no-rekam-medis" value="<?= $pasien['no_rekam_medis']; ?>" type="text" class="form-control" disabled required>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>
                                    <input id="pasien-nama" value="<?= $pasien['nama_pasien']; ?>" type="text" class="form-control" disabled required>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    <input id="pasien-jenis-kelamin" value="<?= ($pasien['jenis_kelamin']) ? 'Laki-laki' : 'Perempuan'; ?>" type="text" class="form-control" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Golongan Darah</td>
                                <td>
                                    <input id="pasien-golongan-darah" value="<?= $pasien['golongan_darah']; ?>" type=" text" class="form-control" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>
                                    <input id="pasien-tanggal-lahir" value="<?= $pasien['tgl_lahir']; ?>" type="text" class="form-control" disabled>
                                </td>
                            </tr>

                            <tr>
                                <th rowspan="5" scope="row">
                                    Dokter
                                    <br>
                                    <br>
                                    <a class="btn btn-outline-success" href="<?= base_url('/dokter/edit/' . $dokter['id']); ?>" target="_blank">
                                        <i data-feather="edit"></i> Edit
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>
                                    <div class="input-group">
                                        <input id="dokter-nip" value="<?= $dokter['nip']; ?>" type="text" class="form-control" required>
                                        <button id="btn-search-dokter" class="btn btn-outline-secondary" type="button"><i data-feather="search"></i></button>
                                    </div>
                                    <input name="id_dokter" value="<?= $dokter['id']; ?>" id="dokter-id" class="visually-hidden" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>
                                    <input id="dokter-nama" value="<?= $dokter['nama']; ?>" type="text" class="form-control" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Izin Praktik</td>
                                <td>
                                    <input id="dokter-izin-praktik" value="<?= $dokter['izin_praktek']; ?>" type="text" class="form-control" disabled>

                                </td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td>
                                    <input id="dokter-no-hp" value="<?= $dokter['no_hp']; ?>" type="text" class="form-control" disabled>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $("#btn-search-pasien").click(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('perawatan/findPasienByNik'); ?>",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: {
                nik: $("#pasien-nik").val()
            },
            success: function(result) {
                try {
                    let pasien = JSON.parse(result);
                    $("#pasien-nik").removeClass('is-invalid');
                    $("#pasien-id").val(pasien.id);
                    $("#pasien-no-rekam-medis").val(pasien.no_rekam_medis);
                    $("#pasien-nama").val(pasien.nama_pasien);
                    $("#pasien-jenis-kelamin").val((pasien.jenis_kelamin == 0) ? 'Perempuan' : 'Laki-laki');
                    $("#pasien-golongan-darah").val(pasien.golongan_darah);
                    $("#pasien-tanggal-lahir").val(pasien.tgl_lahir);
                } catch (error) {
                    $("#pasien-nik").addClass('is-invalid');
                    $("#pasien-id").val('');
                    $("#pasien-no-rekam-medis").val('Pasien tidak ditemukan');
                    $("#pasien-nama").val('Pasien tidak ditemukan');
                    $("#pasien-jenis-kelamin").val('Pasien tidak ditemukan');
                    $("#pasien-golongan-darah").val('Pasien tidak ditemukan');
                    $("#pasien-tanggal-lahir").val('Pasien tidak ditemukan');
                }
            }
        })
    });

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
                    $("#dokter-izin-praktik").val(dokter.izin_praktek);
                    $("#dokter-no-hp").val(dokter.no_hp);
                } catch (error) {
                    $("#dokter-nip").addClass('is-invalid');
                    $("#dokter-id").val('');
                    $("#dokter-nama").val('Dokter tidak ditemukan');
                    $("#dokter-izin-praktik").val('Dokter tidak ditemukan');
                    $("#dokter-no-hp").val('Dokter tidak ditemukan');
                }
            }
        })
    });
</script>
<?= $this->endSection(); ?>