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
<!-- Routing Machine -->
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<!-- Marker Cluster -->
<script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>

<script>
    var southWest = L.latLng(-6.726921172, 108.3626442),
northEast = L.latLng(-7.206124262731635, 108.7958942);
    var bounds = L.latLngBounds(southWest, northEast);

    var map_init = L.map('map', {
        center: bounds.getCenter(),
        zoom: 12,
        minZoom: 10,
        maxBounds: bounds,
    });
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
	subdomains: 'abcd',
    });

    var Stadia_OSMBright = L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png', {
	attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
    }).addTo(map_init);

    var redIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    L.Routing.control({
        // waypoints: [
        //     L.latLng(-6.950459445, 108.4889957),
        //     L.latLng(-6.887860695, 108.4921943)
        // ],
        collapsible: false,
        routeWhileDragging: true,
        // createMarker: function(i, wp, nWps) {
        //     return L.marker(wp.latLng, {icon: redIcon });
        // },
        geocoder: L.Control.Geocoder.nominatim()
    }).addTo(map_init);

    var array = [];
    <?php foreach ($sekolah as $s) : ?>
        <?php if($s['isvalid'] == '1') : ?>
            marker = new L.marker([<?= $s['longitude']; ?>, <?= $s['latitude']; ?>], {icon: redIcon}).addTo(map_init).bindPopup("Sekolah :<br><?= $s['nama'] ?><br>Alamat :<br><?= $s['alamat'] ?><br>Email :<br><?= $s['email'] ?><br>No. Telepon :<br><?= $s['nohp'] ?><br>Lat : <br><?= $s['latitude'] ?><br>Lon :<br><?= $s['longitude'] ?>");
            array.push(marker);
        <?php endif; ?>
    <?php endforeach; ?>
    
    var layerGroup = L.featureGroup(array).addTo(map_init);

    var myStyle = {
        "color": "#CC0800",
        "weight": 5,
        "opacity": 0.65
    };

    L.geoJSON(myLines, {
        style: myStyle
    }).addTo(map_init);

    var baseMaps = {
        'OSM': osm,
        'Carto DB': CartoDB_DarkMatter,
        'Stadia': Stadia_OSMBright
    }

    var overlayMap = {
        'Marker': layerGroup,
    }

    L.control.layers(baseMaps, overlayMap).addTo(map_init);

</script>


<?= $this->endSection(); ?>