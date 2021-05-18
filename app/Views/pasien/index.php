<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mx-3 mb-3">
        <div class="col">
            <h1><?= $title; ?></h1>
            <?php if ($keyword) : ?>
                <p>Menampilkan <?= sizeOf($pasienList); ?> hasil pencarian dengan kata kunci '<?= $keyword; ?>'. <a href="<?= base_url('/pasien'); ?>">Reset pencarian.</a></p>
            <?php endif; ?>
        </div>

    </div>

    <div class="card px-4 py-3">
        <div class="row">
            <div class="col">
                <a href="/pasien/create" class="btn btn-primary mt-3"><i data-feather="plus"></i> Tambah data</a>
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
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No. Rekam Medis</th>
                            <th scope="col">No. Handphone</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $startingNumber ?>
                        <?php foreach ($pasienList as $pasien) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $pasien['nik']; ?></td>
                                <td><?= $pasien['nama_pasien']; ?></td>
                                <td><?= $pasien['no_rekam_medis']; ?></td>
                                <td><?= $pasien['no_hp']; ?></td>
                                <td>
                                    <a href="<?= base_url('/pasien/detail/' . $pasien['id']); ?>" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('pasien', 'custom_simple'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>