<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Register</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('username')) ? 'is-invalid' : '' ?>" 
                                   id="username" name="username" value="<?= old('username') ?>">
                            <?php if (session('validation') && session('validation')->hasError('username')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('username') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control <?= (session('validation') && session('validation')->hasError('email')) ? 'is-invalid' : '' ?>" 
                                   id="email" name="email" value="<?= old('email') ?>">
                            <?php if (session('validation') && session('validation')->hasError('email')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('email') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control <?= (session('validation') && session('validation')->hasError('password')) ? 'is-invalid' : '' ?>" 
                                   id="password" name="password">
                            <?php if (session('validation') && session('validation')->hasError('password')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('password') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control <?= (session('validation') && session('validation')->hasError('confirm_password')) ? 'is-invalid' : '' ?>" 
                                   id="confirm_password" name="confirm_password">
                            <?php if (session('validation') && session('validation')->hasError('confirm_password')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('confirm_password') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <p>Sudah punya akun? <a href="<?= base_url('login') ?>">Login disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 