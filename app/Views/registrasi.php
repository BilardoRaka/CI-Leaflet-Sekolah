<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <h2 class="my-2">Registrasi Sekolah</h2>
        <hr>
        <div class="col-6">
            <form action="/registrasi" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-2">
                        <label for="npsn" class="col-form-label">NPSN</label>
                    </div>
                    <div class="col-10">
                        <input type="number" id="npsn" name="npsn" value="<?= old('npsn'); ?>" placeholder="NPSN" class="form-control <?= ($validation->hasError('npsn')) ? "is-invalid" : ""; ?>">
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
                            <option value="Negeri" <?= (old('status') == "negeri" ? "selected" : ""); ?>>Negeri</option>
                            <option value="Swasta" <?= (old('status') == "swasta" ? "selected" : ""); ?>>Swasta</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('status'); ?>
                        </div>
                    </div>
                    <div class="col-7">
                        <input type="text" id="nama" name="nama" value="<?= old('nama'); ?>" placeholder="Nama Sekolah" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>">
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
                        <input type="text" id="kecamatan" name="kecamatan" value="<?= old('kecamatan'); ?>" placeholder="Kecamatan" class="form-control <?= ($validation->hasError('kecamatan')) ? "is-invalid" : ""; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kecamatan'); ?>
                        </div>
                    </div>
                    <div class="col-7">
                        <input type="text" id="alamat" name="alamat" value="<?= old('alamat'); ?>" placeholder="Alamat Lengkap" class="form-control <?= ($validation->hasError('alamat')) ? "is-invalid" : ""; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-2">
                        <label for="kepsek" class="col-form-label">Kepsek</label>
                    </div>
                    <div class="col-10">
                        <input type="text" id="kepsek" name="kepsek" value="<?= old('kepsek'); ?>" placeholder="Nama Kepala Sekolah" class="form-control <?= ($validation->hasError('kepsek')) ? "is-invalid" : ""; ?>">
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
                        <input type="email" id="email" name="email" value="<?= old('email'); ?>" placeholder="Email Sekolah" class="form-control <?= ($validation->hasError("email")) ? "is-invalid" : ""; ?>">
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
                        <input type="number" id="nohp" name="nohp" value="<?= old('nohp'); ?>" placeholder="No. Telepon Sekolah" class="form-control <?= ($validation->hasError("nohp")) ? "is-invalid" : ""; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nohp'); ?>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-2">
                        <label for="username" class="col-form-label">Username</label>
                    </div>
                    <div class="col-10">
                        <input type="text" id="username" name="username" value="<?= old('username'); ?>" placeholder="Username" class="form-control <?= ($validation->hasError("username")) ? "is-invalid" : ""; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-2">
                        <label for="password" class="col-form-label">Password</label>
                    </div>
                    <div class="col-5">
                        <input type="password" id="password" name="password" value="<?= old('password'); ?>" placeholder="Password" class="form-control <?= ($validation->hasError("password")) ? "is-invalid" : ""; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("password"); ?>
                        </div>
                    </div>
                    <div class="col-5">
                        <input type="password" id="confirmpwd" name="confirmpwd" placeholder="Ulangi Password" class="form-control <?= ($validation->hasError("confirmpwd")) ? "is-invalid" : ""; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("confirmpwd"); ?>
                        </div>
                    </div>
                </div>
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
                </div>
        </div>
        <div class="col-6">
            <input type="hidden" id="latitude" value="<?= old('latitude'); ?>" name="latitude">
            <input type="hidden" id="longitude" value="<?= old('longitude'); ?>" name="longitude">
            Tekan Lokasi Sekolah pada Peta Tersedia
            <div class="row g-3 align-items-center">
                <div class="col-12">
                    <div id="map" style="width: 100%;height: 61vh;"></div>
                </div>
                <p class="text-danger small">
                    <?= $validation->getError('latitude'); ?>
                </p>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Registrasi</button>
        </div>
        </form>
    </div>
</div>

<script>
    var southWest = L.latLng(-6.726921172, 108.3626442),
northEast = L.latLng(-7.206124262731635, 108.7958942);
    var bounds = L.latLngBounds(southWest, northEast);
    
    <?php if (old('latitude') != null) : ?>
        var map_init = L.map('map', {
            center: bounds.getCenter(),
            zoom: 10,
            minZoom: 10,
            maxBounds: bounds,
        });
        var marker = L.marker([<?= old('longitude'); ?>, <?= old('latitude'); ?>]).addTo(map_init);

    <?php else : ?>
    var map_init = L.map('map', {
        center: bounds.getCenter(),
        zoom: 10,
        minZoom: 10,
        maxBounds: bounds,
    });
        var marker;
    <?php endif; ?>
    

    
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map_init);

    //change lat lon value and marker pop up

    map_init.on('click', function(e) {
        if (marker) map_init.removeLayer(marker);
        marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map_init);
        document.getElementById("longitude").value = e.latlng.lat;
        document.getElementById("latitude").value = e.latlng.lng;
    });

    //old value marker
    // var ;

    // var baseMaps = {
    //     "OpenStreetMap": osm,
    //     "Mapbox Streets": streets
    // };

    // var overlayMaps = {
    //     "Cities": cities
    // };

    // var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map_init);
 

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