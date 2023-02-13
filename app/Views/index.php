<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-2">Sistem Informasi Geografis Sekolah</h2>
            <hr>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="mt-3 alert alert-success">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <!-- Carousel -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item img-fluid active" data-bs-interval="5000">
                        <img src="img/3.jpg" class="d-block w-30" alt="...">
                    </div>
                    <div class="carousel-item img-fluid" data-bs-interval="5000">
                        <img src="img/1.png" class="d-block w-30" alt="...">

                    </div>
                    <div class="carousel-item img-fluid" data-bs-interval="5000">
                        <img src="img/2.jpg" class="d-block w-30" alt="...">
                    </div>
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
            <p style="text-align:justify">
                Selamat datang di Sistem Informasi Geografis SMA/SMK Kabupaten Kuningan. Situs ini bertujuan untuk menyajikan kepada publik berbagai informasi yang terkait dengan lokasi dan data Sekolah Menengah Atas dan Sekolah Mengenah Kejuruan di Kabupaten Kuningan.
            </p>
            <p style="text-align:right">
                <br><br>
                Harap hubungi admin setelah selesai registrasi sekolah untuk diterima.
                <br><br>
                <i class="bi bi-whatsapp"></i> +6262626262626
            </p>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>