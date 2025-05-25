<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><?= $title ?></h5>
                    <a href="<?= base_url('books/create') ?>" class="btn btn-primary">Tambah Buku</a>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($books as $book) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= esc($book['judul']) ?></td>
                                        <td><?= esc($book['penulis']) ?></td>
                                        <td><?= esc($book['penerbit']) ?></td>
                                        <td><?= esc($book['tahun_terbit']) ?></td>
                                        <td>
                                            <a href="<?= base_url('books/edit/' . $book['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="<?= base_url('books/delete/' . $book['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($books)) : ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data buku</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 