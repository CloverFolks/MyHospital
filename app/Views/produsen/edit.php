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
                <form action="<?= base_url('/produsen/update/' . $produsen['id']); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $produsen['id']; ?>">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Kode Produsen</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('kode_produsen')) ? 'is-invalid' : ''; ?>" id="kode_produsen" name="kode_produsen" value="<?= (old('kode_produsen')) ? old('kode_produsen') : $produsen['kode_produsen'] ?>" autofocus placeholder="e.g 327642758">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_produsen'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Produsen</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_produsen')) ? 'is-invalid' : ''; ?>" id="nama_produsen" name="nama_produsen" value="<?= (old('nama_produsen')) ? old('nama_produsen') : $produsen['nama_produsen'] ?>" placeholder="e.g PT Kimia Farma">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_produsen'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    <textarea type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="e.g Jl. Agus Salim"><?= (old('alamat')) ? old('alamat') : $produsen['alamat'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Berdiri</td>
                                <td>
                                    <input name="tanggal_berdiri" value="<?= $produsen['tanggal_berdiri']; ?>" type="date" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" id="telepon" name="telepon" value="<?= (old('telepon')) ? old('telepon') : $produsen['telepon'] ?>" placeholder="e.g 021-2348397">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telepon'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $produsen['email'] ?>" placeholder="e.g info@kable.id">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('website')) ? 'is-invalid' : ''; ?>" id="website" name="website" value="<?= (old('website')) ? old('website') : $produsen['website'] ?>" placeholder="e.g www.kalbe.com">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('website'); ?>
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