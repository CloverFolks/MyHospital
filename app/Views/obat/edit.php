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
                <form action="<?= base_url('/obat/update/' . $obat['id']); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $obat['id']; ?>">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Kode</td>
                                <td>
                                    <input name="kode" type="hidden" value="<?= $obat['kode']; ?>">
                                    <input type="text" class="form-control" placeholder="<?= $obat['kode']; ?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Obat</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_obat')) ? 'is-invalid' : ''; ?>" id="nama_obat" name="nama_obat" value="<?= (old('nama_obat')) ? old('nama_obat') : $obat['nama_obat'] ?>" autofocus placeholder="e.g Glukagon">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_obat'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Obat</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('jenis_obat')) ? 'is-invalid' : ''; ?>" id="jenis_obat" name="jenis_obat" value="<?= (old('jenis_obat')) ? old('jenis_obat') : $obat['jenis_obat'] ?>" placeholder="e.g Pulvis">
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
                                    <select name="label_obat" class="form-select" required>
                                        <option value="" disabled>Pilih label obat</option>
                                        <?php foreach ($label_obat as $p) : ?>
                                            <option value="<?= $p; ?>" <?= ($p == $obat['label_obat']) ? 'selected' : ''; ?>><?= $p; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Produsen</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('produsen')) ? 'is-invalid' : ''; ?>" id="produsen" name="produsen" value="<?= (old('produsen')) ? old('produsen') : $obat['produsen'] ?>" placeholder="e.g Kimia Farma">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('produsen'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>
                                    <?php
                                    $kategori = array("Vitamin dan Suplemen", "Jantung", "Batuk dan Flu", "Saluran Pencernaan", "Demam", "Tulang dan Sendi", "Alergi", "Antibiotik", "Mata", "Kulit");
                                    ?>
                                    <select name="kategori" class="form-select" required>
                                        <option value="" disabled>Pilih kategori obat</option>
                                        <?php foreach ($kategori as $p) : ?>
                                            <option value="<?= $p; ?>" <?= ($p == $obat['kategori']) ? 'selected' : ''; ?>><?= $p; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Komposisi</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('komposisi')) ? 'is-invalid' : ''; ?>" id="komposisi" name="komposisi" value="<?= (old('komposisi')) ? old('komposisi') : $obat['komposisi'] ?>" placeholder="e.g Kimia Farma">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('komposisi'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor BPOM</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_bpom')) ? 'is-invalid' : ''; ?>" id="no_bpom" name="no_bpom" value="<?= (old('no_bpom')) ? old('no_bpom') : $obat['no_bpom'] ?>" placeholder="e.g NA17181302437">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_bpom'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Aturan Pakai</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('aturan_pakai')) ? 'is-invalid' : ''; ?>" id="aturan_pakai" name="aturan_pakai" value="<?= (old('aturan_pakai')) ? old('aturan_pakai') : $obat['aturan_pakai'] ?>" placeholder="e.g Kimia Farma">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('aturan_pakai'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kontra Indikasi</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('kontra_indikasi')) ? 'is-invalid' : ''; ?>" id="kontra_indikasi" name="kontra_indikasi" value="<?= (old('kontra_indikasi')) ? old('kontra_indikasi') : $obat['kontra_indikasi'] ?>" placeholder="e.g Kimia Farma">
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
<?= $this->endSection(); ?>