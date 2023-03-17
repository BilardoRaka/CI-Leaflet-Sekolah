<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h2 class="my-2">Detail Sekolah <?= $sekolah['nama']; ?></h2>
    <hr>
    <?php if ($galeris != null) : ?>
        <div>
            <div class="col-12 mb-3">
                <!-- Carousel -->
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">
                        <?php $i = 1; ?>
                        <?php foreach ($galeris as $galeri) : ?>
                            <div class="carousel-item img-fluid <?= ($i == 1) ? "active" : ""; ?>">
                                <img src="/img/galeri/<?= $galeri['image']; ?>" class="d-block w-90 mx-auto" alt="...">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div><!-- Carousel -->
            </div>
        </div>
        <?php else : ?>
            <div>
                <div class="col-12 mb-3">
                    <img src="https://source.unsplash.com/random/1200x400?school" class="d-block w-90 mx-auto" alt="...">
                </div>
            </div>
    <?php endif; ?>
    <hr>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-5">
                    <div class="card bg-light mb-3">
                        <p class="h5 card-header">Data Umum</p>
                        <p class="card-body">
                            NPSN Sekolah    :<br><?= $sekolah['id'] ?><br>
                            Alamat Sekolah  :<br><?= $sekolah['kecamatan']; ?>, <?= $sekolah['alamat']; ?><br>
                            Kepala Sekolah  :<br><?= $sekolah['kepsek']; ?><br>
                            Email Sekolah   :<br><?= $sekolah['email']; ?><br>
                            No. Telepon     :<br><?= $sekolah['nohp']; ?>
                        </p>
                    </div>
                    <div class="card bg-light mb-3">
                        <p class="h5 card-header">Data Penyelenggaraan</p>
                        <p class="card-body">
                            Akreditasi      :<br><?= $sekolah['akreditasi'] ?><br>
                            Kurikulum       :<br><?= $sekolah['kurikulum']; ?><br>
                            Penyelenggaraan :<br><?= $sekolah['penyelenggaraan']; ?><br>
                        </p>
                    </div>
                    <div class="card bg-light mb-3">
                        <p class="h5 card-header">Data Jurusan</p>
                        <p class="card-body">
                            <?php $i = 1; ?>
                            <?php foreach ($jurusans as $jurusan) : ?>
                                <?= $i++ ?>. <?= $jurusan['nama_jurusan'] ?><br>
                            <?php endforeach;?>
                        </p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card bg-light mb-3">
                        <p class="h5 card-header">Data Personil</p>
                        <p class="card-body">
                            Jumlah Guru            :<br><?= $sekolah['guru'] ?><br>
                            Jumlah Siswa Laki-laki :<br><?= $sekolah['siswa_laki']; ?><br>
                            Jumlah Siswa Perempuan :<br><?= $sekolah['siswa_perempuan']; ?><br>
                        </p>
                    </div>
                    <div class="card bg-light">
                        <p class="h5 card-header">Data Fasilitas</p>
                        <p class="card-body">
                            Jumlah Ruang Kelas  :<br><?= $sekolah['ruang_kelas'] ?><br>
                            Jumlah Laboratorium :<br><?= $sekolah['laboratorium']; ?><br>
                            Jumlah Perpustakaan :<br><?= $sekolah['perpustakaan']; ?><br>
                        </p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-light">
                    <p class="h5 card-header">Lokasi Geografis Sekolah</p>
                        <div id="map" class="mt-3" style="width: 100%;height: 59vh;"></div>
                    </div>
                    <a href="/sekolah" class="btn btn-md bg-primary text-white mt-3">Kembali ke Menu Sekolah</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        var southWest = L.latLng(<?= $sekolah['longitude']; ?>, <?= $sekolah['latitude']; ?>),
northEast = L.latLng(<?= $sekolah['longitude']; ?>, <?= $sekolah['latitude']; ?>);
    var bounds = L.latLngBounds(southWest, northEast);

    var map_init = L.map('map', {
        center: [<?= $sekolah['longitude']; ?>, <?= $sekolah['latitude']; ?>],
        zoom: 13,
        minZoom: 13,
        maxBounds: bounds,

    });
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map_init);

    var marker = L.marker([<?= $sekolah['longitude']; ?>, <?= $sekolah['latitude']; ?>]).addTo(map_init);


</script>


<?= $this->endSection(); ?>