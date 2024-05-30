<?php 
include 'template/header.php'; 
include 'koneksi.php';
?>
<!-- page content -->
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 col-sm-12 ">
            <div class="jumbotron">
               <h1 class="display-4">Selamat Datang</h1>
               <p class="lead">Sistem Informasi Geografis Pemetaan Lokasi Penginapan di Kota Palu</p>
               <hr class="my-4">
               <div class="col">
               <div id="map" style="height: 400px;">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   var mymap = L.map('map').setView([-0.789275, 113.921327], 4);
    var layerMap = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}/?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' +
            'Imagery <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });
    mymap.addLayer(layerMap);
</script>
<!-- /page content -->
<?php include 'template/footer.php' ?>