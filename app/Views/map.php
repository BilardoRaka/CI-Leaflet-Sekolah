<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h3 class="my-2">Pemetaan SMA/SMK di Kabupaten Kuningan</h3>
    <hr>
    <div class="row">
        <div class="col-12">
            <p style="text-align:justify;">
                Gambar dibawah ini merupakan peta dari Kabupaten Kuningan beserta petanda (marker) berupa lokasi dari sekolah tingkat SMA/SMK. <b>Silahkan tekan marker yang diinginkan untuk mengetahui detail informasi dari sekolah terkait.</b>
            </p>
        </div>
        <div class="col-12">
            <div id="map" style="width: 100%;height: 66vh;"></div>
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


    <?php foreach ($sekolah as $s) : ?>
        <?php if($s['isvalid'] == '1') : ?>
            var marker = L.marker([<?= $s['longitude']; ?>, <?= $s['latitude']; ?>]).addTo(map_init).bindPopup("Sekolah :<br><?= $s['nama'] ?><br>Alamat :<br><?= $s['alamat'] ?><br>Email :<br><?= $s['email'] ?><br>No. Telepon :<br><?= $s['nohp'] ?><br>Lat : <br><?= $s['latitude'] ?><br>Lon :<br><?= $s['longitude'] ?>");
        <?php endif; ?>
    <?php endforeach; ?>
    
 

    var myStyle = {
        "color": "#CC0800",
        "weight": 5,
        "opacity": 0.65
    };

    L.geoJSON(myLines, {
        style: myStyle
    }).addTo(map_init);

    // map.fitBounds(map_init.getBounds());
</script>


<?= $this->endSection(); ?>