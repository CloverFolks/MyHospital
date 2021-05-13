<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class=""><?= $title; ?></h1>
        </div>
        <div class="col">
            <a href="/perawatan/create" class="btn btn-primary mt-3">Tambah Registrasi Perawatan</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No. Registrasi</th>
                        <th scope="col">Poliklinik</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($perawatan as $p) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p['no_registrasi']; ?></td>
                            <td><?= $p['poliklinik']; ?></td>
                            <td><?= $p['tgl_masuk']; ?></td>
                            <td><?= $p['tgl_keluar']; ?></td>
                            <td><a href="<?= base_url('/perawatan/' . $p['id']); ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>