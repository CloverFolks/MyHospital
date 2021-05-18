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
                <table class="table">
                    <tbody>
                        <tr>
                            <th rowspan="12">
                                <img src="/images/avatar/default.jpg" class="img-thumbnail img-preview" width="200px">
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <label for="image_profile" class="form-label">Foto Profile</label>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="file" class="form-control <?= ($validation->hasError('image_profile')) ? 'is-invalid' : ''; ?>" id="image_profile" name="image_profile" onchange="previewImg()" value="<?= old('image_profile'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('image_profile'); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="nik" class="form-label">NIK</label>
                            </td>
                            <td>
                                <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= old('nik'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="no_rekam_medis" class="form-label">No. Rekam Medis</label>
                                <input name="no_rekam_medis" type="hidden" value="<?= $no_rekam_medis; ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control <?= ($validation->hasError('no_rekam_medis')) ? 'is-invalid' : ''; ?>" id="no_rekam_medis" name="no_rekam_medis" placeholder="<?= $no_rekam_medis; ?>" disabled>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_rekam_medis'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                            </td>
                            <td>
                                <input type="text" class="form-control <?= ($validation->hasError('nama_pasien')) ? 'is-invalid' : ''; ?>" id="nama_pasien" name="nama_pasien" value="<?= old('nama_pasien'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_pasien'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            </td>
                            <td>
                                <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" aria-describedby="tgl_lahirHelp" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgl_lahir'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            </td>
                            <td>
                                <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" value="<?= old('pekerjaan'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('pekerjaan'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="no_hp" class="form-label">No. Handphone</label>
                            </td>
                            <td>
                                <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" value="<?= old('no_hp'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_hp'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="golongan_darah" class="form-label">Golongan Darah</label>
                            </td>
                            <td>
                                <input type="text" class="form-control <?= ($validation->hasError('golongan_darah')) ? 'is-invalid' : ''; ?>" id="golongan_darah" name="golongan_darah" value="<?= old('golongan_darah'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('golongan_darah'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            </td>
                            <td>
                                <select name="jenis_kelamin" class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                                    <option value="" selected>Pilih jenis kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_kelamin'); ?>
                                    </div>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="status_menikah" class="form-label">Status Menikah</label>
                            </td>
                            <td>
                                <select name="status_menikah" class="form-select <?= ($validation->hasError('status_menikah')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                                    <option value="" selected>Pilih status menikah</option>
                                    <option value="Sudah Menikah">Sudah Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_menikah'); ?>
                                    </div>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="alamat" class="form-label">Alamat</label>
                            </td>
                            <td>
                                <div class="form-floating">
                                    <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" placeholder="Leave a comment here" id="alamat" name="alamat"><?= old('alamat'); ?></textarea>
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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