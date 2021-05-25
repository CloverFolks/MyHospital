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
                <form action="<?= base_url('/produsen/update/' . $produsen['id']); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $produsen['id']; ?>">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama Produsen</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_produsen')) ? 'is-invalid' : ''; ?>" id="nama_produsen" name="nama_produsen" value="<?= (old('nama_produsen')) ? old('nama_produsen') : $produsen['nama_produsen'] ?>" autofocus placeholder="e.g PT Kimia Farma">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_produsen'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    <textarea type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="e.g JI. Raya Serang Km.25 No.8 Balaraja 15610"><?= (old('alamat')) ? old('alamat') : $produsen['pabrik'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Berdiri</td>
                                <td>
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_berdiri')) ? 'is-invalid' : ''; ?>" id="tanggal_berdiri" name="tanggal_berdiri" value="<?= (old('tanggal_berdiri')) ? old('tanggal_berdiri') : $produsen['tanggal_berdiri'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_berdiri'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" id="telepon" name="telepon" value="<?= (old('telepon')) ? old('telepon') : $produsen['telepon'] ?>" placeholder="e.g 021-5350535">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telepon'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $produsen['email'] ?>" placeholder="e.g brataco@brataco.co.id">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pabrik</td>
                                <td>
                                    <textarea type="text" class="form-control <?= ($validation->hasError('pabrik')) ? 'is-invalid' : ''; ?>" id="pabrik" name="pabrik" placeholder="e.g Jl. RawaGelam V Pulogadung Jakarta"><?= (old('pabrik')) ? old('pabrik') : $produsen['pabrik'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pabrik'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('website')) ? 'is-invalid' : ''; ?>" id="website" name="website" value="<?= (old('website')) ? old('website') : $produsen['website'] ?>" placeholder="e.g www.dipa.co.id">
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