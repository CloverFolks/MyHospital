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
        <div class="row mb-3">
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                        <i data-feather="settings"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('/produsen/edit/' . $produsen['id']); ?>"><i data-feather="edit"></i> Edit data</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalHapus"><i data-feather="trash-2"></i> Hapus data</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalHapus" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data Produsen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus data produsen ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a type="button" href="/produsen/delete/<?= $produsen['id']; ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <tbody>
                        <tr>
                            <th rowspan="9" scope="row">Data Produsen</th>
                        </tr>
                        <tr>
                            <td>Kode Produsen</td>
                            <td><?= $produsen['kode_produsen']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Produsen</td>
                            <td><?= $produsen['nama_produsen']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $produsen['alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Berdiri</td>
                            <td><?= $produsen['tanggal_berdiri']; ?></td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td><?= $produsen['telepon']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= $produsen['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Pabrik</td>
                            <td><?= $produsen['pabrik']; ?></td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td><?= $produsen['website']; ?></td>
                        </tr>
                    </tbody>
                </table>
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