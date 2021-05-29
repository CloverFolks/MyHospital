<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mx-3 mb-3">
        <div class="col">
            <a class="btn mb-1" href="<?= base_url('/produsen'); ?>"><i data-feather="arrow-left"></i> Kembali</a>
            <h1 class="inline"><?= $title; ?></h1>
        </div>
    </div>

    <div class="card p-4">
        <div class="row">
            <div class="col">
                <form action="<?= base_url('/produsen/save'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Kode Produsen</td>
                                <td>
                                    <input name="kode_produsen" type="hidden" value="<?= $kode_produsen ?>">
                                    <input type="text" class="form-control" disabled placeholder="<?= $kode_produsen; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Produsen</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_produsen')) ? 'is-invalid' : ''; ?>" id="nama_produsen" name="nama_produsen" value="<?= old('nama_produsen'); ?>" autofocus placeholder="e.g PT Kimia Farma">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_produsen'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" placeholder="e.g JI. Raya Serang Km.25 No.8 Balaraja 15610" id="alamat" name="alamat"><?= old('alamat'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Berdiri</td>
                                <td>
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_berdiri')) ? 'is-invalid' : ''; ?>" id="tanggal_berdiri" name="tanggal_berdiri" value="<?= old('tanggal_berdiri'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_berdiri'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>
                                    <input type="tel" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" id="telepon" name="telepon" value="<?= old('telepon'); ?>" placeholder="e.g 021-5350535">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telepon'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>" placeholder="e.g brataco@brataco.co.id">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pabrik</td>
                                <td>
                                    <textarea class="form-control <?= ($validation->hasError('pabrik')) ? 'is-invalid' : ''; ?>" placeholder="e.g Jl. RawaGelam V Pulogadung Jakarta" id="pabrik" name="pabrik"><?= old('pabrik'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pabrik'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('website')) ? 'is-invalid' : ''; ?>" id="website" name="website" value="<?= old('website'); ?>" placeholder="e.g www.dipa.co.id">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('website'); ?>
                                    </div>
                                </td>
                            </tr>
                    </table>
                    <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

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