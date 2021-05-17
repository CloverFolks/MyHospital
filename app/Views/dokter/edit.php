<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a class="btn mb-1" href="<?= base_url('/dokter'); ?>"><i data-feather="arrow-left"></i> Kembali</a>
            <h1 class="inline"><?= $title; ?></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card p-4">
            <form action="/dokter/update/<?= $dokter['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $dokter['id']; ?>">
                <input type="hidden" name="image_profile_lama" value="<?= $dokter['image_profile']; ?>">
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= (old('nik')) ? old('nik') : $dokter['nik'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nik'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" id="nip" name="nip" value="<?= (old('nip')) ? old('nip') : $dokter['nip'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nip'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $dokter['nama'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" aria-describedby="emailHelp" name="email" value="<?= (old('email')) ? old('email') : $dokter['email'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <div class="form-floating">
                        <textarea class="form-control  <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" placeholder="Leave a comment here" id="alamat" name="alamat"><?= (old('alamat')) ? old('alamat') : $dokter['alamat'] ?></textarea>
                    </div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                        <option value="<?= (old('jenis_kelamin')) ? old('jenis_kelamin') : (($dokter['jenis_kelamin']) ? 'Laki-laki' : 'Perempuan'); ?>" selected><?= (old('jenis_kelamin')) ? old('jenis_kelamin') : (($dokter['jenis_kelamin']) ? 'Laki-laki' : 'Perempuan'); ?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis_kelamin'); ?>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis_kelamin'); ?>
                        </div>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="izin_praktek" class="form-label">Izin Praktek</label>
                    <input type="text" class="form-control <?= ($validation->hasError('izin_praktek')) ? 'is-invalid' : ''; ?>" id="izin_praktek" name="izin_praktek" value="<?= (old('izin_praktek')) ? old('izin_praktek') : $dokter['izin_praktek'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('izin_praktek'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tgl_mulai_bekerja" class="form-label">Tanggal Mulai Bekerja</label>
                    <input type="date" class="form-control <?= ($validation->hasError('tgl_mulai_bekerja')) ? 'is-invalid' : ''; ?>" id="tgl_mulai_bekerja" name="tgl_mulai_bekerja" value="<?= (old('tgl_mulai_bekerja')) ? old('tgl_mulai_bekerja') : $dokter['tgl_mulai_bekerja'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tgl_mulai_bekerja'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No Handphone</label>
                    <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" value="<?= (old('no_hp')) ? old('no_hp') : $dokter['no_hp'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_hp'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image_profile" class="form-label">Foto Profile</label>
                    <div class="col-sm-2">
                        <img src="/images/avatar/<?= $dokter['image_profile']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control <?= ($validation->hasError('image_profile')) ? 'is-invalid' : ''; ?>" id="image_profile" name="image_profile" onchange="previewImg()">
                        <label class="input-group-text" for="image_profile"></label>
                        <div class="invalid-feedback">
                            <?= $validation->getError('image_profile'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
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