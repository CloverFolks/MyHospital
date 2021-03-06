<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mx-3 mb-3">
        <div class="col">
            <h1><?= $title; ?></h1>
            <?php if ($keyword) : ?>
                <p>Menampilkan <?= sizeOf($obatList); ?> hasil pencarian dengan kata kunci '<?= $keyword; ?>'. <a href="<?= base_url('/obat'); ?>">Reset pencarian.</a></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="card px-4 py-3">
        <div class="row">
            <div class="col">
                <a href="/obat/create" class="btn btn-primary mt-3"><i data-feather="plus"></i> Tambah data</a>
            </div>
            <div class="col">
                <form action="" method="GET">
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="Kata kunci" name="keyword" value="<?= $keyword ? $keyword : ""; ?>">
                        <button class=" btn btn-primary" type="submit" name="submit"><i data-feather="search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Jenis Obat</th>
                            <th scope="col">Label Obat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $startingNumber ?>
                        <?php foreach ($obatList as $obat) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $obat['kode']; ?></td>
                                <td><?= $obat['nama_obat']; ?></td>
                                <td><?= $obat['jenis_obat']; ?></td>
                                <td><?= $obat['label_obat']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('/obat/detail/' . $obat['id']); ?>" class="btn btn-success btn-sm">Detail</a>
                                        <button type="button" class="btn btn-sm btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?= base_url('/obat/edit/' . $obat['id']); ?>"><i data-feather="edit"></i> Edit data</a></li>
                                            <li><button onclick="hapusObat(<?= $obat['id']; ?>)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalHapusObat"><i data-feather="trash-2"></i> Hapus data</button></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('obat', 'custom_simple'); ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapusObat" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah yakin ingin menghapus data obat ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="formHapusObat" action="" method="POST" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function hapusObat(id) {
        $('#formHapusObat').attr('action', "<?= base_url('/obat/delete') ?>/" + id);
    }
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