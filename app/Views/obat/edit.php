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
                                    <input type="text" class="form-control <?= ($validation->hasError('label_obat')) ? 'is-invalid' : ''; ?>" id="label_obat" name="label_obat" value="<?= (old('label_obat')) ? old('label_obat') : $obat['label_obat'] ?>" placeholder="e.g Obat Keras">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('label_obat'); ?>
                                    </div>
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
                                <td>Nomor BPOM</td>
                                <td>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_bpom')) ? 'is-invalid' : ''; ?>" id="no_bpom" name="no_bpom" value="<?= (old('no_bpom')) ? old('no_bpom') : $obat['no_bpom'] ?>" placeholder="e.g NA17181302437">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_bpom'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Produksi</td>
                                <td>
                                    <input type="date" class="form-control <?= ($validation->hasError('tgl_produksi')) ? 'is-invalid' : ''; ?>" id="tgl_produksi" name="tgl_produksi" value="<?= (old('tgl_produksi')) ? old('tgl_produksi') : $obat['tgl_produksi'] ?>" placeholder="e.g Pilih tanggal">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_produksi'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Expired</td>
                                <td>
                                    <input type="date" class="form-control <?= ($validation->hasError('tgl_kedaluwarsa')) ? 'is-invalid' : ''; ?>" id="tgl_kedaluwarsa" name="tgl_kedaluwarsa" value="<?= (old('tgl_kedaluwarsa')) ? old('tgl_kedaluwarsa') : $obat['tgl_kedaluwarsa'] ?>" placeholder="e.g Pilih tanggal">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_kedaluwarsa'); ?>
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