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
        <div class="row mb-3">
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                        <i data-feather="settings"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('/obat/edit/' . $obat['id']); ?>"><i data-feather="edit"></i> Edit data</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalHapus"><i data-feather="trash-2"></i> Hapus data</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalHapus" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data Obat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus data obat ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a type="button" href="/obat/delete/<?= $obat['id']; ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <tbody>
                        <tr>
                            <th rowspan="5" scope="row">Produsen</th>
                        </tr>
                        <tr>
                            <td>Kode Produsen</td>
                            <td><?= ($obat['kode_produsen']); ?></td>
                        </tr>
                        <tr>
                            <td>Nama Produsen</td>
                            <td><?= $obat['nama_produsen']; ?></td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td><?= $obat['telepon']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= $obat['email']; ?></td>
                        </tr>


                        <tr>
                            <th rowspan="11" scope="row" scope="row" width="200px">Obat</th>
                        </tr>
                        <tr>
                            <td width="150px">Kode</td>
                            <td>
                                <svg class="barcode" jsbarcode-value="<?= $obat['kode']; ?>" jsbarcode-textmargin="0" jsbarcode-fontoptions="bold">
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td width="150px">Nama Obat</td>
                            <td><?= $obat['nama_obat']; ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Jenis Obat</td>
                            <td><?= $obat['jenis_obat']; ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Label Obat</td>
                            <td><?= $obat['label_obat']; ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Kategori</td>
                            <td><?= $obat['kategori']; ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Komposisi</td>
                            <td><?= $obat['komposisi']; ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Nomor BPOM</td>
                            <td><?= $obat['no_bpom']; ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Aturan Pakai</td>
                            <td style="padding-right: 100px;">
                                <?= $obat['aturan_pakai']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="150px">Kontra Indikasi</td>
                            <td style="padding-right: 100px;">
                                <?= $obat['kontra_indikasi']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="/js/jsbarcode.all.min.js"></script>
<script>
    JsBarcode(".barcode").init();
</script>

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