<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <h2>Ganti Password Akun</h2>
        <hr>
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('msg'); ?>
            </div>
        <?php endif ?>
        <div class="col-6">
            <form action="/gantipassword/submit" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">Password Lama</label>
                    <input type="password" value="<?= old('oldPassword'); ?>" name="oldPassword" id="oldPassword" class="form-control mb-1" placeholder="Password Lama" required autofocus>
                    <input type="checkbox" onclick="showpwdold()"> <small>Show Password</small>
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">Password Baru</label>
                    <input type="password" value="<?= old('newPassword'); ?>" name="newPassword" id="newPassword" class="form-control mb-1 <?= $validation->hasError('newPassword') ? "is-invalid" : ""; ?>" placeholder="Password Baru" required>
                    <input type="checkbox" onclick="showpwdnew()"> <small>Show Password</small>
                    <div class="invalid-feedback">
                        <?= $validation->getError('newPassword'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ganti Password</button>
            </form>
        </div>
    </div>
</div>

<script>
    function showpwdold() {
        var x = document.getElementById("oldPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showpwdnew() {
        var x = document.getElementById("newPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?= $this->endSection(); ?>