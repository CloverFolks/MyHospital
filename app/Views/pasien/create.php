<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a class="btn mb-1" href="<?= base_url('/pasien'); ?>"><i data-feather="arrow-left"></i> Kembali</a>
            <h1 class="inline"><?= $title; ?></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card p-4">
            <form action="/pasien/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= old('nik'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nik'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="no_rekam_medis" class="form-label">No. Rekam Medis</label>
                    <input type="text" class="form-control <?= ($validation->hasError('no_rekam_medis')) ? 'is-invalid' : ''; ?>" id="no_rekam_medis" name="no_rekam_medis" value="<?= old('no_rekam_medis'); ?>" placeholder="0000-00-00">
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_rekam_medis'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_pasien')) ? 'is-invalid' : ''; ?>" id="nama_pasien" name="nama_pasien" value="<?= old('nama_pasien'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_pasien'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" aria-describedby="tgl_lahirHelp" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tgl_lahir'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" value="<?= old('pekerjaan'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('pekerjaan'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. Handphone</label>
                    <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" value="<?= old('no_hp'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_hp'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="golongan_darah" class="form-label">Golongan Darah</label>
                    <input type="text" class="form-control <?= ($validation->hasError('golongan_darah')) ? 'is-invalid' : ''; ?>" id="golongan_darah" name="golongan_darah" value="<?= old('golongan_darah'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('golongan_darah'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin" value="<?= old('jenis_kelamin'); ?>" placeholder="laki-laki/perempuan">
                    <div class="invalid-feedback">
                        <?= $validation->getError('jenis_kelamin'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="status_menikah" class="form-label">Status Menikah</label>
                    <input type="text" class="form-control <?= ($validation->hasError('status_menikah')) ? 'is-invalid' : ''; ?>" id="status_menikah" name="status_menikah" value="<?= old('status_menikah'); ?>" placeholder="sudah menikah/belum menikah">
                    <div class="invalid-feedback">
                        <?= $validation->getError('status_menikah'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image_profile" class="form-label">Foto Profile</label>
                    <div class="col-sm-2">
                        <img src="/images/avatar/default.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control <?= ($validation->hasError('image_profile')) ? 'is-invalid' : ''; ?>" id="image_profile" name="image_profile" onchange="previewImg()" value="<?= old('image_profile'); ?>">
                        <label class="input-group-text" for="image_profile">Upload</label>
                        <div class="invalid-feedback">
                            <?= $validation->getError('image_profile'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<script>
    function previewImg() {
        const profile = document.querySelector('#image_profile');
        const profileLabel = document.querySelector('.form-control')
        const imgPreview = document.querySelector('.img-preview')

        profileLabel.textContent = profile.files[0].name;

        const fileProfile = new FileReader();
        fileProfile.readAsDataURL(profile.files[0]);

        fileProfile.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?= $this->endSection(); ?>