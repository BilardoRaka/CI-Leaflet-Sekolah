<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h2 class="my-2">Detail Sekolah <?= $sekolah['nama']; ?></h2>
    <?php if ($galeris != null) : ?>
        <hr>
        <div class="card bg-secondary"><br>
            <div class="col-12 mb-3">
                <!-- Carousel -->
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">
                        <?php $i = 1; ?>
                        <?php foreach ($galeris as $galeri) : ?>
                            <div class="carousel-item img-fluid <?= ($i == 1) ? "active" : ""; ?>">
                                <img src="/img/galeri/<?= $galeri['image']; ?>" class="d-block w-90" alt="...">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div><!-- Carousel -->
            </div>
        </div>
    <?php endif; ?>
    <hr>

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-6">
                    <div id="map" style="width: 100%;height: 60vh;"></div>
                </div>
                <div class="col-6">
                    <p>NPSN Sekolah :<br><?= $sekolah['id'] ?></p>
                    <p>Alamat Sekolah :<br><?= $sekolah['kecamatan']; ?>, <?= $sekolah['alamat']; ?></p>
                    <p>Kepala Sekolah :<br><?= $sekolah['kepsek']; ?></p>
                    <p>Email Sekolah :<br><?= $sekolah['email']; ?></p>
                    <p>No. Telepon :<br><?= $sekolah['nohp']; ?></p>
                    <p><a href="/sekolah" class="text-decoration-none">Kembali ke Menu Sekolah</a></p>
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