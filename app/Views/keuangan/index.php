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
                <a href="/keuangan/create" class="btn btn-primary mt-3"><i data-feather="plus"></i> Tambah data</a>
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
                                <td><?= $keuangan['jumlah']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('/keuangan/detail/' . $keuangan['id']); ?>" class="btn btn-success btn-sm">Detail</a>
                                        <button type="button" class="btn btn-sm btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?= base_url('/keuangan/edit/' . $keuangan['id']); ?>"><i data-feather="edit"></i> Edit data</a></li>
                                            <li><button onclick="hapusKeuangan(<?= $keuangan['id']; ?>)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalHapusKeuangan"><i data-feather="trash-2"></i> Hapus data</button></li>
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
<?= $this->endSection(); ?>