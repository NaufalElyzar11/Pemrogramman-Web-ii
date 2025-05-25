<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?= $title ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('books/update/' . $book['id']) ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('judul')) ? 'is-invalid' : '' ?>" 
                                   id="judul" name="judul" value="<?= old('judul', $book['judul']) ?>">
                            <?php if (session('validation') && session('validation')->hasError('judul')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('judul') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('penulis')) ? 'is-invalid' : '' ?>" 
                                   id="penulis" name="penulis" value="<?= old('penulis', $book['penulis']) ?>">
                            <?php if (session('validation') && session('validation')->hasError('penulis')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('penulis') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('penerbit')) ? 'is-invalid' : '' ?>" 
                                   id="penerbit" name="penerbit" value="<?= old('penerbit', $book['penerbit']) ?>">
                            <?php if (session('validation') && session('validation')->hasError('penerbit')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('penerbit') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="number" class="form-control <?= (session('validation') && session('validation')->hasError('tahun_terbit')) ? 'is-invalid' : '' ?>" 
                                   id="tahun_terbit" name="tahun_terbit" value="<?= old('tahun_terbit', $book['tahun_terbit']) ?>" min="1800" max="2023">
                            <?php if (session('validation') && session('validation')->hasError('tahun_terbit')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('tahun_terbit') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('books') ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 