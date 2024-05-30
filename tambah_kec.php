<?php
include 'template/header.php';
include 'koneksi.php';
?>

<?php include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $poligon = $_POST['poligon'];
    $warna = $_POST['warna'];

    $queryResult = $conn->query("INSERT INTO kecamatan(nama,warna,poligon) VALUES('$nama','$warna','$poligon')");

    if ($queryResult) {
        $_SESSION['pesan'] = 'Data berhasil Ditambahkan';
    }
}
?>
<!-- Page Content --> 
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Kecamatan</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <div id="map" style="height: 400px; "></div>
            <div class="x_panel">
                
                    <div class="x_title">
                        <h2>Tambah Data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" action="" method="POST">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Kecamatan<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" required class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Warna<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="color" required class="form-control" name="warna">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Koordinat Poligon<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea required class="form-control" name="poligon" id="poligon" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="reset">RESET</button>
                                    <button type="submit" class="btn btn-success" name="simpan">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Kecamatan</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-white">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kecamatan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'koneksi.php';
                                $query = $conn->query("SELECT * FROM kecamatan");
                                $no = 1;
                                if ($query->num_rows > 0) {
                                    while ($row = $query->fetch_row()) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row[1]; ?></td>
                                            <td>
                                            <a class="btn btn-danger btn-hapus-kecamatan" href="delete_kecamatan.php?id=<?= $row[0]; ?>"><i class="fa fa-trash"></i></a>
                                        </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="map" style="height: 400px; "></div>
        </div>
    </div>
</div>
<script>
    var map = L.map('map').setView([-0.8931699926701577, 119.8647374574928], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}',{foo: 'bar', attribution: 
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMaps</a> contributors, ' +
        'Imagery <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'
    }).addTo(map);
    //kecamatan
    <?php
    $sql = "SELECT * FROM kecamatan";
    $hasil = $conn->query($sql);
    if ($hasil->num_rows > 0) {
        while ($row = $hasil->fetch_assoc()) { ?>
            var drawItems = L.geoJson(<?= $row['poligon'] ?>, {
                color: "<?= $row['warna'] ?>"
            }).bindPopup('<center><h5><?= $row['nama'] ?></h5>').addTo(map);
    <?php
        }
    } ?>

    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);
    var drawControl = new L.Control.Draw({
        draw: {
            polyline: false,
            rectangle: false,
            circle: false,
            marker: false,
            circlemarker: false,
        },
        edit: {
            featureGroup: drawnItems
        }
    });
    map.addControl(drawControl);

    map.on('draw:created', function(event) {
        var layer = event.layer,
            feature = layer.feature = layer.feature || {};

        feature.type = feature.type || "Feature";
        var props = feature.properties = feature.properties || {};
        drawnItems.addLayer(layer);

        var hasil = $('#poligon').val(JSON.stringify(drawnItems.toGeoJSON()));
    });

    //swetalert
    //success
    let pesan = $(' .data-pesan').data('pesan');

    if (pesan) {
        Swal.fire({
            icon: 'success',
            title: pesan,
            showConfirmButton: false,
            timer: 1500
        })
    }

    //hapus kecamatan
    $('.btn-hapus-kecamatan').on('click', function(e) {
        e.preventDefaulth();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data kecamatan akan dihapus?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus data!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>
<!-- /Page Content --> 
<?php include 'template/footer.php' ?>

