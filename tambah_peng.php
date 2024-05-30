<?php
include 'template/header.php';
include 'koneksi.php';


if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kecamatan = $_POST['kecamatan'];
    $no_hp = $_POST['no_hp'];
    $harga = $_POST['harga'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $query = $conn->query("INSERT INTO penginapan(nama, alamat, kecamatan, no_hp, harga, latitude,longitude)
    VALUES('$nama','$alamat','$kecamatan','$no_hp','$harga','$latitude','$longitude')");

    if ($query) {
        $_SESSION['pesan'] = 'Data berhasil ditambahkan';
        echo "<script>window.location.href = 'tambah_peng.php'</script>";
    }
}
?>
<!-- Page Content --> 
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Penginapan</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div id="map" style="height:500px;"></div>
                    <div class="x_title">
                        <h2>Tambah Data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" action="" method="POST">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Penginapan" autofocus required></input>
                                </div>
                            </div>
                            <hr>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat Penginapan<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" autofocus required></input>
                                </div>
                            </div>
                            <hr>
                            <div class="item gorm-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kecamatan<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="kecamatan" id="inputState" class="form-control">
                                    <option value="" selected>Silahkan Pilih</option>
                                    <?php
                                    $kec = $conn->query("SELECT * FROM kecamatan ORDER BY nama ASC");
                                    if ($kec->num_rows > 0) {
                                        while ($row = $kec->fetch_row()) { ?>
                                            <option><?= $row[1]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <hr>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No Hp<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="no_hp" placeholder="Masukan No Hp" autofocus required></input>
                                </div>
                            </div>
                            <hr>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Harga<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input ype="text" class="form-control" name="harga" placeholder="Masukan Harga" autofocus required></input>
                                </div>
                            </div>
                            <hr>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Latutide<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input ype="text" class="form-control" name="latitude" placeholder="Masukan Latitude" autofocus required></input>
                                </div>
                            </div>
                            <hr>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Longitude<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input ype="text" class="form-control" name="longitude" placeholder="Masukan Loingitude" autofocus required></input>
                                </div>
                            </div>
                            <div class="item form-group">
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="reset">RESET</button>
                                    <button type="submit" class="btn btn-success" name="simpan">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="item form-group" id="map" ></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let latlang = [0, 0];
    if (latlang[0] == 0 && latlang[1] == 0) {
        latlang = [-0.888027, 119.874639];
    }
    let mymap = L.map('map').setView([-0.8931699926701577, 119.8647374574928], 14);
    let layerMap = L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}/?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' +
                'Imagery <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        });
    mymap.addLayer(layerMap);

    let marker = new L.marker(latlang, {
        draggable: 'false'
    });

    marker.on('dragend', function(event) {
        let position = marker.getLatLng();
        marker.setLatLng(position).update();
        $("#latitude").val(position.lat);
        $("#longitude").val(position.lng);
    });
    mymap.addLayer(marker);
</script>
<!-- /Page Content --> 
<?php include 'template/footer.php' ?>



