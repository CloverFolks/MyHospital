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
                                    <input name="no_registrasi" type="hidden" value="<?= $noRegistrasi; ?>">
                                    <input type="text" class="form-control" placeholder="<?= $noRegistrasi; ?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Masuk</td>
                                <td>
                                    <input name="tgl_masuk" type="date" class="form-control" placeholder="Pilih tanggal" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Keluar</td>
                                <td>
                                    <input name="tgl_keluar" type="date" class="form-control" placeholder="Pilih tanggal">
                                </td>
                            </tr>
                            <tr>
                                <td>Poliklinik</td>
                                <td>
                                    <select name="poliklinik" class="form-select" required>
                                        <option value="" disabled selected>Pilih poliklinik</option>
                                        <option value="Bedah">Bedah</option>
                                        <option value="Penyakit Dalam">Penyakit Dalam</option>
                                        <option value="Obstetri dan Ginekologi">Obstetri dan Ginekologi</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Jantung">Jantung</option>
                                        <option value="Syaraf">Syaraf</option>
                                        <option value="THT">THT</option>
                                        <option value="Mata">Mata</option>
                                        <option value="Paru">Paru</option>
                                        <option value="TB-MDR">TB-MDR</option>
                                        <option value="Anestesiologi">Anestesiologi</option>
                                        <option value="DOTS TB">DOTS TB</option>
                                        <option value="Gigi">Gigi</option>
                                        <option value="Dokter Gigi Spesialis">Dokter Gigi Spesialis</option>
                                        <option value="Psikologi">Psikologi</option>
                                        <option value="Tumbuh Kembang Anak">Tumbuh Kembang Anak</option>
                                        <option value="Kulit dan Kelamin">Kulit dan Kelamin</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th rowspan="7" scope="row">
                                    Pasien
                                    <br>
                                    <br>
                                    <a class="btn btn-outline-success" href="<?= base_url('/pasien/create'); ?>" target="_blank">
                                        <i data-feather="user-plus"></i> Baru
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>
                                    <div class="input-group">
                                        <input id="pasien-nik" type="text" class="form-control" required>
                                        <button id="btn-search-pasien" class="btn btn-outline-secondary" type="button"><i data-feather="search"></i></button>
                                    </div>
                                    <input name="id_pasien" id="pasien-id" type="text" class="visually-hidden" required>
                                </td>
                            </tr>
                            <tr>
                                <td>No. Rekam Medis</td>
                                <td>
                                    <input id="pasien-no-rekam-medis" type="text" class="form-control" disabled required>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>
                                    <input id="pasien-nama" type="text" class="form-control" disabled required>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    <input id="pasien-jenis-kelamin" type="text" class="form-control" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Golongan Darah</td>
                                <td>
                                    <input id="pasien-golongan-darah" type="text" class="form-control" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>
                                    <input id="pasien-tanggal-lahir" type="text" class="form-control" disabled>
                                </td>
                            </tr>

                            <tr>
                                <th rowspan="5" scope="row">
                                    Dokter
                                    <br>
                                    <br>
                                    <a class="btn btn-outline-success" href="<?= base_url('/dokter/create'); ?>" target="_blank">
                                        <i data-feather="user-plus"></i> Baru
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>
                                    <div class="input-group">
                                        <input id="dokter-nik" type="text" class="form-control" required>
                                        <button id="btn-search-dokter" class="btn btn-outline-secondary" type="button"><i data-feather="search"></i></button>
                                    </div>
                                    <input name="id_dokter" id="dokter-id" class="visually-hidden" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>
                                    <input id="dokter-nama" type="text" class="form-control" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Izin Praktik</td>
                                <td>
                                    <input id="dokter-izin-praktik" type="text" class="form-control" disabled>

                                </td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td>
                                    <input id="dokter-no-hp" type="text" class="form-control" disabled>
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
    })

    $("#btn-search-dokter").click(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('perawatan/findDokterByNik'); ?>",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: {
                nik: $("#dokter-nik").val()
            },
            success: function(result) {
                try {
                    let dokter = JSON.parse(result);
                    $("#dokter-nik").removeClass('is-invalid');
                    $("#dokter-id").val(dokter.id);
                    $("#dokter-nama").val(dokter.nama);
                    $("#dokter-izin-praktik").val(dokter.izin_praktek);
                    $("#dokter-no-hp").val(dokter.no_hp);
                } catch (error) {
                    $("#dokter-nik").addClass('is-invalid');
                    $("#dokter-id").val('');
                    $("#dokter-nama").val('Dokter tidak ditemukan');
                    $("#dokter-izin-praktik").val('Dokter tidak ditemukan');
                    $("#dokter-no-hp").val('Dokter tidak ditemukan');
                }
            }
        })
    })
</script>
<?= $this->endSection(); ?>