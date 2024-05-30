<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Penginapan Kota Palu</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
   <!-- ====== library leaflet ====== -->
   <link rel="stylesheet" href="../assets/leaflet/leaflet.css">
    <script src="../assets/leaflet/leaflet.js"></script>
    <link rel="stylesheet" href="../assets/leaflet/leaflet-panel-layers/src/leaflet-panel-layers.css">
    <script src="../assets/leaflet/leaflet-panel-layers/src/leaflet-panel-layers.js"></script>
    <!-- leaflet draw -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw-src.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
</head>

<?php 
include 'koneksi.php';
?>

<body>
   <!-- header section start -->
   <div class="header_section">
      <div class="header_main">
         <div class="mobile_menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="logo_mobile"><a href="index.php"><img src="images/logo.png"></a></div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="view.php">View</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
         <div class="container-fluid">
            <div class="logo"><a href="../user/index.php"><img src="images/logo.png"></a></div>
            <div class="menu_main">
               <ul>
                  <li class="active"><a href="../user/index.php">Home</a></li>
                  <li><a href="../user/view.php">View</a></li>
                  <li><a href="../user/about.php">About</a></li>
                  <li><a href="../login.php">LogIn</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- banner section start -->
      <div class="banner_section layout_padding">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h6 class="mb-6 banner_taital">Pemetaan Lokasi Penginapan</h6>
                     <div class="item form-group " id="map" style="width: 1120px;height: 800px;" >
                  </div>
               </div>
            </div>
      </div>
      <!-- banner section end -->
   </div>
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text"> Sistem Informasi Geografis </p>
      </div>
   </div>
   <!-- copyright section end -->

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
        iconUrl: "../img/bed.png",
        iconSize: [25, 25],
        iconAnchor: [15, 48], 
        popupAnchor: [-2, -24]
    });
    let motor = L.icon({
        iconUrl: "../img/gojek.png",
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
  
    <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- javascript -->
   <script src="js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
<!-- ====== library leaflet ====== -->
<link rel="stylesheet" href="assets/leaflet/leaflet.css">
    <script src="assets/leaflet/leaflet.js"></script>
    <link rel="stylesheet" href="assets/leaflet/leaflet-panel-layers/src/leaflet-panel-layers.css">
    <script src="assets/leaflet/leaflet-panel-layers/src/leaflet-panel-layers.js"></script>
    <!-- leaflet draw -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw-src.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
</html>