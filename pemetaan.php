<?php
include 'template/header.php';
include 'koneksi.php';
?>
<!-- Page Content --> 
<div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Alternative</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pilih Lokasi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" action="" method="POST">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 label-align" for="first-name">Lokasi Awal<span class="required"></span>
                                </label>
                                <select id="lokasi_awal" class="form-control">
                                    <option selected>-- Silahkan Pilih --</option>
                                    <?php
                                    include 'koneksi.php';
                                    $kec = $conn->query("SELECT * FROM penginapan ORDER BY nama asc");
                                    if ($kec->num_rows > 0) {
                                        while ($row = $kec->fetch_assoc()) {
                                    ?>
                                            <!-- tambahkan spasi antara, dan longitude -->
                                            <option value="<?= $row['latitude']; ?>, <?= $row['longitude']; ?>" ?><?= $row['nama']; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 label-align" for="first-name">Lokasi Tujuan<span class="required"></span>
                                </label>
                                <select id="lokasi_tujuan" class="form-control">
                                    <option selected>--Silahkan Pilih--</option>
                                    <?php

                                    include 'koneksi.php';
                                    $kec = $conn->query("SELECT * FROM penginapan ORDER BY nama asc");

                                    if ($kec->num_rows > 0) {
                                        while ($row = $kec->fetch_assoc()) {
                                    ?>
                                            <option value="<?= $row['latitude']; ?>,<?= $row['longitude']; ?>" ?><?= $row['nama']; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="item form-group">
                            </div>
                            <div class="In_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-danger" type="reset">Reset</button>
                                    <button id="rute" class="btn btn-primary">Rute</button>
                                </div>
                            </div>
                        </form>
                        <div id="map" style="height: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var mymap = L.map('map').setView([-0.8015765979181984, 119.88107614042585], 11);
    var layerMap = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}/?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' +
            'Imagery <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });
    mymap.addLayer(layerMap);

     // legend
    let baseLayers = [{
        group: "Tipe Maps",
        layers: [{
                name: "light",
                layer: layerMap
            },
            {
                name: "street",
                layer: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
                    foo: 'bar',
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMaps</a> contributors'
                })
            },
            {
                name: "dark",
                layer: L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}/?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>,' +
                        'Imagery @ <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/dark-v10'
                })
            }
        ]
    }];

    let overLayers = [
        {
        group: "Kecamatan Mantikulore",
        collapsed: true,
        layers: [
            <?php
            $query = $conn->query("SELECT * FROM penginapan WHERE kecamatan='Kecamatan Mantikulore'");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) { ?> {
                        name: "<?= $row['nama'] ?>",
                        layer: L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).bindPopup('<?= $row['nama'] ?>(<?= $row['alamat']; ?>)')
                    },
            <?php }
            } ?>
        ]

        },{
        group: "Kecamatan Palu Utara",
        collapsed: true,
        layers: [
            <?php
            $query = $conn->query("SELECT * FROM penginapan WHERE kecamatan='Kecamatan Palu Utara'");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) { ?> {
                        name: "<?= $row['nama'] ?>",
                        layer: L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).bindPopup('<?= $row['nama'] ?>(<?= $row['alamat']; ?>)')
                    },
            <?php }
            } ?>
        ]
        },{
        group: "Kecamatan Tawaeli",
        collapsed: true,
        layers: [
            <?php
            $query = $conn->query("SELECT * FROM penginapan WHERE kecamatan='Kecamatan Tawaeli'");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) { ?> {
                        name: "<?= $row['nama'] ?>",
                        layer: L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).bindPopup('<?= $row['nama'] ?>(<?= $row['alamat']; ?>)')
                    },
            <?php }
            } ?>
        ]
        },{
        group: "Kecamtan Palu Timur",
        collapsed: true,
        layers: [
            <?php
            $query = $conn->query("SELECT * FROM penginapan WHERE kecamatan='Kecamatan Palu Timur'");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) { ?> {
                        name: "<?= $row['nama'] ?>",
                        layer: L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).bindPopup('<?= $row['nama'] ?>(<?= $row['alamat']; ?>)')
                    },
            <?php }
            } ?>
        ]
        }
        ,{
        group: "Kecamatan Palu Selatan",
        collapsed: true,
        layers: [
            <?php
            $query = $conn->query("SELECT * FROM penginapan WHERE kecamatan='Kecamatan Palu Selatan'");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) { ?> {
                        name: "<?= $row['nama'] ?>",
                        layer: L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).bindPopup('<?= $row['nama'] ?>(<?= $row['alamat']; ?>)')
                    },
            <?php }
            } ?>
        ]
        }
        ,{
        group: "Kecamatan Ulujadi",
        collapsed: true,
        layers: [
            <?php
            $query = $conn->query("SELECT * FROM penginapan WHERE kecamatan='Kecamatan Ulujadi'");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) { ?> {
                        name: "<?= $row['nama'] ?>",
                        layer: L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).bindPopup('<?= $row['nama'] ?>(<?= $row['alamat']; ?>)')
                    },
            <?php }
            } ?>
        ]
        },{
        group: "Kecamtan Palu Barat",
        collapsed: true,
        layers: [
            <?php
            $query = $conn->query("SELECT * FROM penginapan WHERE kecamatan='Kecamatan Palu Barat'");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) { ?> {
                        name: "<?= $row['nama'] ?>",
                        layer: L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).bindPopup('<?= $row['nama'] ?>(<?= $row['alamat']; ?>)')
                    },
            <?php }
            } ?>
        ]
        },{
        group: "Kecamtan Tatanga",
        collapsed: true,
        layers: [
            <?php
            $query = $conn->query("SELECT * FROM penginapan WHERE kecamatan='Kecamatan Tatanga'");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) { ?> {
                        name: "<?= $row['nama'] ?>",
                        layer: L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).bindPopup('<?= $row['nama'] ?>(<?= $row['alamat']; ?>)')
                    },
            <?php }
            } ?>
        ]
        }
    ];
    layerControl = mymap.addControl(new L.Control.PanelLayers(baseLayers, overLayers, {
        collapsibleGroups: true
    }));
    
    //icon img
    let penginapan = L.icon({
        iconUrl: "img/bed.png",
        iconSize: [25, 25],
        iconAnchor: [15, 48], 
        popupAnchor: [-2, -24]
    });
    let motor = L.icon({
        iconUrl: "img/gojek.png",
        iconSize: [25, 25],
        iconAnchor: [15, 48], 
        popupAnchor: [-2, -24]
    });

    <?php
    //icon
    include 'koneksi.php';
    $sql = "SELECT * FROM penginapan";
    $hasil = $conn->query($sql);
    if ($hasil->num_rows > 0) {
        while ($row = $hasil->fetch_row()) { ?>
            L.marker([<?= $row[6] ?>, <?= $row[7] ?>], {icon : penginapan}).bindPopup('<center><h5><?= $row[1] ?></h5> <br> Alamat : <?= $row[3] ?> <br>' + "<a href='detail_penginapan.php?id=<?= $row[0] ?>' class='btn btn-outline-info btn-sm mt-2'>Detail</a>").addTo(mymap);
    <?php
        }
    } ?>
    //kecamatan
    <?php
    $sql = "SELECT * FROM kecamatan";
    $hasil = $conn->query($sql);
    if ($hasil->num_rows > 0) {
        while ($row = $hasil->fetch_assoc()) { ?>
            var drawItems = L.geoJson(<?= $row['poligon'] ?>, {
                color: "<?= $row['warna'] ?>"
            }).bindPopup('<center><h5><?= $row['nama'] ?></h5>').addTo(mymap);
    <?php
        }
    } ?>
    $('#rute').on('click', function() {
        let awal = $('#lokasi_awal').val();
        let awalLatLng = awal.split(',')
        let tujuan = $('#lokasi_tujuan').val();
        let tujuanLatLng = tujuan.split(',')
        console.log(awal)
        console.log(tujuan)
        // console.log(tuj)

        // routing machine
        L.Routing.control({
            waypoints: [
                L.latLng(awalLatLng[0], awalLatLng[1]),
                L.latLng(tujuanLatLng[0], tujuanLatLng[1])
            ],
            routeWhileDragging: false
        }).addTo(mymap);
    });
</script>
<!-- /Page Content -->
<?php include 'template/footer.php' ?>

