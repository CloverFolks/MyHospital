<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mx-3 mb-3">
        <div class="col">
            <h1><?= $title; ?></h1>
            <?php if ($keyword) : ?>
                <p>Menampilkan <?= sizeOf($keuanganList); ?> hasil pencarian dengan kata kunci '<?= $keyword; ?>'. <a href="<?= base_url('/keuangan'); ?>">Reset pencarian.</a></p>
            <?php endif; ?>
        </div>

    </div>

    <div class="card px-4 py-3">
        <div class="row">
            <div class="col">
                <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modal-tambah-laporan"><i data-feather="plus-circle"></i> Tambah data</button>
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
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $startingNumber ?>
                        <?php foreach ($keuanganList as $keuangan) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= ($keuangan['jumlah'] > 0) ? "Pemasukan" : "Pengeluaran"; ?></td>
                                <td><?= $keuangan['keterangan']; ?></td>
                                <td class="text-end "> <?= ($keuangan['jumlah'] < 0) ? '-' : ''; ?> <?= 'Rp' . number_format(abs($keuangan['jumlah']), 0, ',', '.'); ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button onclick="populateFormEditLaporan(<?= $keuangan['id']; ?>)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-edit-laporan"><i data-feather="edit"></i> Edit</a></button></li>
                                            <li><button type="button" onclick="hapusLaporan(<?= $keuangan['id']; ?>)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-hapus-laporan"><i data-feather="trash-2"></i> Hapus</button></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('keuangan', 'custom_simple'); ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-laporan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit data laporan keuangan</h5>
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal"></button>
            </div>
            <form id="form-edit-laporan" action="" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" id="form-edit-laporan-id">
                <div class="modal-body">
                    <select id="form-edit-laporan-jenis" name="jenis" class="form-select mb-3" required>
                        <option value="" disabled>Jenis</option>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>

                    <div class="form-floating mb-3">
                        <input name="jumlah" type="number" min="1" class="form-control" id="form-edit-laporan-jumlah" placeholder="0" required>
                        <label for="form-edit-laporan-jumlah">Jumlah (Rp)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="keterangan" type="text" class="form-control" id="form-edit-laporan-keterangan" placeholder="Keterangan" required>
                        <label for="form-edit-laporan-keterangan">Keterangan</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-close-modal btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah-laporan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah data laporan keuangan</h5>
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal"></button>
            </div>
            <form id="form-tambah-laporan" action="<?= base_url('/keuangan/saveLaporan'); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <select name="jenis" class="form-select mb-3" required>
                        <option value="" disabled selected>Jenis</option>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>

                    <div class="form-floating mb-3">
                        <input name="jumlah" type="number" min="1" class="form-control" id="form-tambah-laporan-jumlah" placeholder="0" required>
                        <label for="form-tambah-laporan-jumlah">Jumlah (Rp)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="keterangan" type="text" class="form-control" id="form-tambah-laporan-keterangan" placeholder="Keterangan" required>
                        <label for="form-tambah-laporan-keterangan">Keterangan</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-close-modal btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-hapus-laporan" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah yakin ingin menghapus data laporan keuangan ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="<?= base_url('/keuangan/delete'); ?>" method="POST" class="d-inline">
                    <?= csrf_field(); ?>
                    <input id="form-hapus-laporan-id" type="hidden" name="id" value="" required>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function populateFormEditLaporan(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('keuangan/findById'); ?>",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: {
                id: id
            },
            success: function(result) {
                try {
                    let data = JSON.parse(result);
                    $('#form-edit-laporan').attr('action', '<?= base_url('/keuangan/saveLaporan'); ?>/' + data.id);
                    $("#form-edit-laporan-id").val(data.id);
                    $("#form-edit-laporan-jenis").val((data.jumlah > 0) ? "pemasukan" : "pengeluaran");
                    $("#form-edit-laporan-jumlah").val(Math.abs(data.jumlah));
                    $("#form-edit-laporan-keterangan").val(data.keterangan);
                } catch (error) {
                    console.log(error);
                }
            }
        })
    }

    function hapusLaporan(id) {
        $('#form-hapus-laporan-id').val(id);
    }
</script>
<?= $this->endSection(); ?>