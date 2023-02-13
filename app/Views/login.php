<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="mt-3 alert alert-danger">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="mt-3 alert alert-success">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>
            <form action="/login" method="post">
                <?= csrf_field(); ?>
                <img class="my-3 rounded mx-auto d-block" src="/img/map.png" alt="" width="200" height="150">
                <h4 class="mb-3 fw-normal text-center">Sistem Informasi Geografis<br>SMA/SMK Kabupaten Kuningan</h4>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username" autofocus required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-md btn-primary mb-2" type="submit">Login</button>
            </form>
            <small>
                <p class="text-center">Silahkan daftarkan sekolah anda <a href="/registrasi" class="text-decoration-none">disini</a></p>
            </small>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>