<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mx-3 mb-3">
        <div class="col">
            <a class="btn mb-1" href="<?= base_url('/obat'); ?>"><i data-feather="arrow-left"></i> Kembali</a>
            <h1 class="inline"><?= $title; ?></h1>
        </div>
    </div>

    <div class="card p-4">
        <div class="row">
            <div class="col">
                <form action="<?= base_url('/obat/save'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th rowspan="5" scope="row">
                                    Produsen
                                    <br>
                                    <br>
                                    <a class="btn btn-outline-success" href="<?= base_url('/produsen/create'); ?>" target="_blank">
                                        <i data-feather="user-plus"></i> Baru
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <td>Kode Produsen</td>
                                <td>
                                    <div class="input-group">
                                        <input id="produsen-kode" type="text" class="form-control" value="<?= old('kode_produsen'); ?>" autofocus required>
                                        <button id="btn-search-produsen" class="btn btn-outline-secondary" type="button"><i data-feather="search"></i></button>
                                    </div>
                                    <input name="id_produsen" id="produsen-id" type="text" class="visually-hidden" value="<?= old('id_produsen'); ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Produsen</td>
                                <td>
                                    <input id="produsen-nama" type="text" class="form-control" value="<?= old('nama_produsen'); ?>" disabled required>
                                </td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>
                                    <input id="produsen-telepon" type="text" class="form-control" value="<?= old('telepon'); ?>" disabled required>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input id="produsen-email" type="text" class="form-control" value="<?= old('email'); ?>" disabled required>
                                </td>
                            </tr>

                            <tr>
                                <th rowspan="10" scope="row">Obat</th>
                            </tr>
                            <tr>
                                <td>Kode</td>
                                <td>
                                    <input name="kode" type="hidden" value="<?= $kode; ?>">
                                    <input type="text" class="form-control" placeholder="<?= $kode; ?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Obat</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_obat')) ? 'is-invalid' : ''; ?>" id="nama_obat" name="nama_obat" value="<?= old('nama_obat'); ?>" placeholder="e.g Glukagon">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_obat'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Obat</td>
                                <td>
                                    <?php
                                    $jenis_obat = array("Pulvis", "Pulveres", "Compressi", "Pilulae", "Solutiones", "Suspensiones", "Elmusiones", "Galenik", "Extractum", "Infusa", "Immunosera", "Unguenta", "Suppositoria", "Guttae", "Injectiones");
                                    ?>

                                    <select name="jenis_obat" class="form-select <?= ($validation->hasError('jenis_obat')) ? 'is-invalid' : ''; ?>" id="jenis_obat" name="jenis_obat">
                                        <option value="" disabled <?= old('jenis_obat') ? '' : 'selected'; ?>>Pilih jenis obat</option>
                                        <?php foreach ($jenis_obat as $j) : ?>
                                            <option value="<?= $j; ?>" <?= $j == (old('jenis_obat')) ? 'selected' : ''; ?>><?= $j; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_obat'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Label Obat</td>
                                <td>
                                    <?php
                                    $label_obat = array("Herbal Tradisional", "Herbal Terstandar", "Fitofarmaka", "Beredar Bebas", "Bebas Terbatas", "Obat Keras", "Narkotika");
                                    ?>

                                    <select name="label_obat" class="form-select <?= ($validation->hasError('label_obat')) ? 'is-invalid' : ''; ?>" id="label_obat" name="label_obat">
                                        <option value="" disabled <?= old('label_obat') ? '' : 'selected'; ?>>Pilih jenis obat</option>
                                        <?php foreach ($label_obat as $j) : ?>
                                            <option value="<?= $j; ?>" <?= $j == (old('label_obat')) ? 'selected' : ''; ?>><?= $j; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('label_obat'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>
                                    <?php
                                    $kategori = array("Vitamin dan Suplemen", "Jantung", "Batuk dan Flu", "Saluran Pencernaan", "Demam", "Tulang dan Sendi", "Alergi", "Antibiotik", "Mata", "Kulit");
                                    ?>

                                    <select name="kategori" class="form-select <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori">
                                        <option value="" disabled <?= old('kategori') ? '' : 'selected'; ?>>Pilih jenis obat</option>
                                        <?php foreach ($kategori as $j) : ?>
                                            <option value="<?= $j; ?>" <?= $j == (old('kategori')) ? 'selected' : ''; ?>><?= $j; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kategori'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Komposisi</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('komposisi')) ? 'is-invalid' : ''; ?>" id="komposisi" name="komposisi" value="<?= old('komposisi'); ?>" placeholder="e.g Paracetamol 500Mg">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('komposisi'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor BPOM</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_bpom')) ? 'is-invalid' : ''; ?>" id="no_bpom" name="no_bpom" value="<?= old('no_bpom'); ?>" placeholder="e.g NA17181302437">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_bpom'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Aturan Pakai</td>
                                <td>
                                    <textarea class="form-control <?= ($validation->hasError('aturan_pakai')) ? 'is-invalid' : ''; ?>" placeholder="Dikonsumsi setelah makan" id="aturan_pakai" name="aturan_pakai"><?= old('aturan_pakai'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('aturan_pakai'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kontra Indikasi</td>
                                <td>
                                    <textarea class="form-control <?= ($validation->hasError('kontra_indikasi')) ? 'is-invalid' : ''; ?>" placeholder="Tidak dianjurkan untuk pengidap hipertensi" id="kontra_indikasi" name="kontra_indikasi"><?= old('kontra_indikasi'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kontra_indikasi'); ?>
                                    </div>
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
    $("#btn-search-produsen").click(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('obat/findProdusenByKode'); ?>",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: {
                kode_produsen: $("#produsen-kode").val()
            },
            success: function(result) {
                try {
                    let produsen = JSON.parse(result);
                    $("#produsen-kode").removeClass('is-invalid');
                    $("#produsen-id").val(produsen.id);
                    $("#produsen-nama").val(produsen.nama_produsen);
                    $("#produsen-telepon").val(produsen.telepon);
                    $("#produsen-email").val(produsen.email);
                } catch (error) {
                    $("#produsen-kode").addClass('is-invalid');
                    $("#produsen-id").val('');
                    $("#produsen-nama").val('Nama produsen tidak ditemukan');
                    $("#produsen-telepon").val('Nomor telepon tidak ditemukan');
                    $("#produsen-email").val('Alamat email tidak ditemukan');
                }
            }
        })
    });
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        <?php if (session()->getFlashdata('pesan')) { ?>
            swal({
                title: "<?= session()->getFlashdata('pesan') ?>",
                text: "<?= session()->getFlashdata('pesan_text') ?>",
                icon: "<?= session()->getFlashdata('pesan_icon') ?>",
            });
        <?php } ?>
    });
</script>
<?= $this->endSection(); ?>