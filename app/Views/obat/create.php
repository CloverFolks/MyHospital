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
                                <td>Kode</td>
                                <td>
                                    <input name="kode" type="hidden" value="<?= $kode; ?>">
                                    <input type="text" class="form-control" placeholder="<?= $kode; ?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Obat</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_obat')) ? 'is-invalid' : ''; ?>" id="nama_obat" name="nama_obat" value="<?= old('nama_obat'); ?>" autofocus placeholder="e.g Glukagon">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_obat'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Obat</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('jenis_obat')) ? 'is-invalid' : ''; ?>" id="jenis_obat" name="jenis_obat" value="<?= old('jenis_obat'); ?>" placeholder="e.g Pulvis">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_obat'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Label Obat</td>
                                <td>
                                    <select name="label_obat" class="form-select <?= ($validation->hasError('label_obat')) ? 'is-invalid' : ''; ?>" id="label_obat" name="label_obat" value="<?= old('label_obat'); ?>">
                                        <option value="" disabled selected>Pilih label obat</option>
                                        <option value="Herbal Tradisional">Herbal Tradisional</option>
                                        <option value="Herbal Terstandar">Herbal Terstandar</option>
                                        <option value="Fitofarmaka">Fitofarmaka</option>
                                        <option value="Beredar Bebas">Beredar Bebas</option>
                                        <option value="Bebas Terbatas">Bebas Terbatas</option>
                                        <option value="Obat Keras">Obat Keras</option>
                                        <option value="Narkotika">Narkotika</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('label_obat'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Produsen</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('produsen')) ? 'is-invalid' : ''; ?>" id="produsen" name="produsen" value="<?= old('produsen'); ?>" placeholder="e.g Kimia Farma">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('produsen'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>
                                    <select name="kategori" class="form-select <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" value="<?= old('kategori'); ?>">
                                        <option value="" disabled selected>Pilih kategori obat</option>
                                        <option value="Vitamin dan Suplemen">Vitamin dan Suplemen</option>
                                        <option value="Jantung">Jantung</option>
                                        <option value="Batuk dan Flu">Batuk dan Flu</option>
                                        <option value="Saluran Pencernaan">Saluran Pencernaan</option>
                                        <option value="Demam">Demam</option>
                                        <option value="Tulang dan Sendi">Tulang dan Sendi</option>
                                        <option value="Alergi">Alergi</option>
                                        <option value="Antibiotik">Antibiotik</option>
                                        <option value="Mata">Mata</option>
                                        <option value="Kulit">Kulit</option>
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
                                    <input type="text" class="form-control <?= ($validation->hasError('aturan_pakai')) ? 'is-invalid' : ''; ?>" id="aturan_pakai" name="aturan_pakai" value="<?= old('aturan_pakai'); ?>" placeholder="e.g Sesudah makan">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_kedaluwarsa'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kontra Indikasi</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('kontra_indikasi')) ? 'is-invalid' : ''; ?>" id="kontra_indikasi" name="kontra_indikasi" value="<?= old('kontra_indikasi'); ?>" placeholder="e.g Tidak dianjurkan untuk pengidap hipertensi">
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