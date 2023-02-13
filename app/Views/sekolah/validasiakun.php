<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-2">Daftar Akun Sekolah belum di Validasi</h2>
            <hr>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>
            <div class="col-6">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan keyword..." name="keyword">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Sekolah</th>
                        <th scope="col">Status</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (7 * ($currentPage - 1)); ?>
                    <?php foreach ($sekolah as $s) : ?>
                        <tr>
                            <td align="center"><?= $i++; ?></th>
                            <td><?= $s['nama']; ?></td>
                            <td align='center'><?= $s['status']; ?></td>
                            <td><?= $s['alamat']; ?></td>
                            <td align="center">
                            <form action="/validasiakun/acc/<?= $s['id']; ?>" method="post">
                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin untuk mevalidasi sekolah ini?');"><i class="bi bi-check2"></i></button>
                            </form>
                                <?php if (session('role') == 'admin') : ?>
                                    <form action="/sekolah/<?= $s['user_id']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data sekolah ini?');"><i class="bi bi-trash"></i></button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('sekolah', 'pagination'); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>