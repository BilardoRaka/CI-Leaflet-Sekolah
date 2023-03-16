<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-2">Daftar Sekolah SMA/SMK Kabupaten Kuningan</h2>
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
                        <th scope="col">Akreditasi</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telepon</th>
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
                            <td align='center'><?= $s['akreditasi']; ?></td>
                            <td><?= $s['alamat']; ?></td>
                            <td align='right'><?= $s['nohp']; ?></td>
                            <td align="center">
                                
                                <a href="/sekolah/<?= $s['slug']; ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                <?php if (session('role') == 'admin') : ?>
                                    <form action="/validasiakun/nonacc/<?= $s['id']; ?>" method="post">
                                        <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Apakah anda yakin untuk non-validasi akun sekolah ini?');"><i class="bi bi-x-octagon"></i></button>
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