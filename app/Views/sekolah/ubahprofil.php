<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <h2>Ubah Profil Sekolah</h2>
        <hr>
        <div class="col-6">
            <form action="/profil/update/<?= $sekolah['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" id="latitude" name="latitude" value="<?= $sekolah['latitude']; ?>">
            <input type="hidden" id="longitude" name="longitude" value="<?= $sekolah['longitude']; ?>">
            <input type="hidden" id="slug" name="slug" value="<?= $sekolah['slug']; ?>">
            <div class="card bg-light mb-3">
                <p class="h5 card-header">Data Umum</p>
                <div class="card-body">
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-2">
                            <label for="npsn" class="col-form-label">NPSN</label>
                        </div>
                        <div class="col-10">
                            <input type="number" id="npsn" name="npsn" value="<?= $sekolah['id']; ?>" placeholder="NPSN" class="form-control <?= ($validation->hasError('npsn')) ? "is-invalid" : ""; ?>" readonly>
                            <div class="invalid-feedback">
                                <?= $validation->getError('npsn'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-2">
                            <label for="sekolah" class="col-form-label">Sekolah</label>
                        </div>
                        <div class="col-3">
                            <select class="form-select form-select-md <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" id="status" name="status">
                                <option selected value="" hidden>Status</option>
                                <option value="Negeri" <?= $sekolah['status'] == "Negeri" ? "selected" : ""; ?>>Negeri</option>
                                <option value="Swasta" <?= $sekolah['status'] == "Swasta" ? "selected" : ""; ?>>Swasta</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('status'); ?>
                            </div>
                        </div>
                        <div class="col-7">
                            <input type="text" id="nama" name="nama" value="<?= $sekolah['nama']; ?>" placeholder="Nama Sekolah" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-2">
                            <label for="alamat" class="col-form-label">Alamat</label>
                        </div>
                        <div class="col-3">
                            <input type="text" id="kecamatan" name="kecamatan" value="<?= $sekolah['kecamatan']; ?>" placeholder="Kecamatan" class="form-control <?= ($validation->hasError('kecamatan')) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kecamatan'); ?>
                            </div>
                        </div>
                        <div class="col-7">
                            <input type="text" id="alamat" name="alamat" value="<?= $sekolah['alamat']; ?>" placeholder="Alamat Lengkap" class="form-control <?= ($validation->hasError('alamat')) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('alamat'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-2">
                            <label for="kepsek" class="col-form-label">Kepala Sekolah</label>
                        </div>
                        <div class="col-10">
                            <input type="text" id="kepsek" name="kepsek" value="<?= $sekolah['kepsek']; ?>" placeholder="Nama Kepala Sekolah" class="form-control <?= ($validation->hasError('kepsek')) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kepsek'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-2">
                            <label for="email" class="col-form-label">E-mail</label>
                        </div>
                        <div class="col-10">
                            <input type="email" id="email" name="email" value="<?= $sekolah['email']; ?>" placeholder="Email Sekolah" class="form-control <?= ($validation->hasError("email")) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-2">
                            <label for="nohp" class="col-form-label">Telepon</label>
                        </div>
                        <div class="col-10">
                            <input type="text" id="nohp" name="nohp" value="<?= $sekolah['nohp'] ?>" placeholder="No. Telepon Sekolah" class="form-control <?= ($validation->hasError("nohp")) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nohp'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-light mb-3">
                <p class="h5 card-header">Data Penyelenggaraan</p>
                <div class="card-body">
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-3">
                            <label for="akreditasi" class="col-form-label">Akreditasi</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="akreditasi" name="akreditasi" value="<?= $sekolah['akreditasi'] ?>" placeholder="Mutu Akreditasi" class="form-control <?= ($validation->hasError("akreditasi")) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('akreditasi'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-3">
                            <label for="kurikulum" class="col-form-label">Kurikulum</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="kurikulum" name="kurikulum" value="<?= $sekolah['kurikulum'] ?>" placeholder="Kurikulum" class="form-control <?= ($validation->hasError("kurikulum")) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kurikulum'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-3">
                            <label for="penyelenggaraan" class="col-form-label">Penyelenggaraan</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="penyelenggaraan" name="penyelenggaraan" value="<?= $sekolah['penyelenggaraan'] ?>" placeholder="Penyelenggaraan" class="form-control <?= ($validation->hasError("penyelenggaraan")) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('penyelenggaraan'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-light mb-3">
                <p class="h5 card-header">Lokasi Geografis Sekolah</p>
                <div class="card-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-12">
                            Tekan Lokasi Sekolah pada Peta Tersedia
                            <div id="map" style="width: 100%;height: 60vh;"></div>
                        </div>
                        <p class="text-danger small">
                            <?= $validation->getError('latitude'); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Perbarui Profil</button>
                <a href="/profil" class="btn btn-danger">Kembali ke Menu Profil</a>
            </div>
        </div>
        <div class="col-6">
            <div class="card bg-light mb-3">
                <p class="h5 card-header">Data Personil</p>
                <div class="card-body">
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-3">
                            <label for="guru" class="col-form-label">Jumlah Guru</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="guru" name="guru" value="<?= $sekolah['guru'] ?>" placeholder="Jumlah Guru" class="form-control <?= ($validation->hasError("guru")) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('guru'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-3">
                            <label for="siswa_laki" class="col-form-label">Jumlah Siswa Lelaki</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="siswa_laki" name="siswa_laki" value="<?= $sekolah['siswa_laki'] ?>" placeholder="Jumlah Siswa Laki-laki" class="form-control <?= ($validation->hasError("siswa_laki")) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('siswa_laki'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-3">
                            <label for="siswa_perempuan" class="col-form-label">Jumlah Siswa Perempuan</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="siswa_perempuan" name="siswa_perempuan" value="<?= $sekolah['siswa_perempuan'] ?>" placeholder="Jumlah Siswa Perempuan" class="form-control <?= ($validation->hasError("siswa_perempuan")) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('siswa_perempuan'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-light mb-3">
                <p class="h5 card-header">Data Fasilitas</p>
                <div class="card-body">
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-3">
                            <label for="ruang_kelas" class="col-form-label">Jumlah Ruang Kelas</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="ruang_kelas" name="ruang_kelas" value="<?= $sekolah['ruang_kelas'] ?>" placeholder="Jumlah Ruang Kelas" class="form-control <?= ($validation->hasError("ruang_kelas")) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('ruang_kelas'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-3">
                            <label for="laboratorium" class="col-form-label">Jumlah Laboratorium</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="laboratorium" name="laboratorium" value="<?= $sekolah['laboratorium'] ?>" placeholder="Jumlah Laboratorium" class="form-control <?= ($validation->hasError("laboratorium")) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('laboratorium'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-3">
                            <label for="perpustakaan" class="col-form-label">Jumlah Perpustakaan</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="perpustakaan" name="perpustakaan" value="<?= $sekolah['perpustakaan'] ?>" placeholder="Jumlah Perpustakaan" class="form-control <?= ($validation->hasError("perpustakaan")) ? "is-invalid" : ""; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('perpustakaan'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-light mb-3">
                <p class="h5 card-header">Data Galeri Sekolah</p>
                <div class="card-body">
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-2">
                            <label for="gambar" class="col-form-label">Tampak<br>Sekolah</label>
                        </div>
                        <div class="col-10">
                            <input type="file" name="gambar[]" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" value="<?= old('gambar'); ?>" multiple>
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar'); ?>
                            </div>
                        </div>
                        </form>
                        <?php if (count($galeris) > 0) : ?>
                        <div class="col-12">
                            <p>
                                Gambar yang digunakan :
                            </p>
                            <?php foreach ($galeris as $galeri) : ?>
                                <form action="/profil/deleteimage/<?= $galeri['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="bg bg-danger border-0" onclick="return confirm('Apakah anda yakin untuk menghapus gambar ini?');">x</button>
                                </form>
                                <img src="/img/galeri/<?= $galeri['image']; ?>" class="img-responsive" style="max-height: 150px; max-width: 150px;" alt="" srcset="">
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>
    
    var southWest = L.latLng(-6.726921172, 108.3626442),
northEast = L.latLng(-7.206124262731635, 108.7958942);
    var bounds = L.latLngBounds(southWest, northEast);

    var map_init = L.map('map', {
        center: bounds.getCenter(),
        zoom: 10,
        minZoom: 10,
        maxBounds: bounds,
    });


    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map_init);

    var marker = L.marker([<?= $sekolah['longitude']; ?>, <?= $sekolah['latitude']; ?>]).addTo(map_init);
    //change lat lon value and marker pop up
    // var marker;
    map_init.on('click', function(e) {
        if (marker) map_init.removeLayer(marker);
        marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map_init);
        document.getElementById("longitude").value = e.latlng.lat;
        document.getElementById("latitude").value = e.latlng.lng;
    });

    var myStyle = {
        "color": "#CC0800",
        "weight": 5,
        "opacity": 0.65
    };

    L.geoJSON(myLines, {
        style: myStyle
    }).addTo(map_init);
</script>

<?= $this->endSection(); ?>