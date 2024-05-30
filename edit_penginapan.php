<?php
include 'template/header.php';
include 'koneksi.php';
if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kecamatan = $_POST['kecamatan'];
    $no_hp = $_POST['no_hp'];
    $harga = $_POST['harga'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $query = $conn->query("UPDATE penginapan SET nama='$nama', alamat='$alamat', kecamatan='$kecamatan', no_hp='$no_hp', harga='$harga', latitude='$latitude', longitude='$longitude' WHERE id='$id'");

    if ($query) {
        echo "<script>
        alert('Data Berhasil Diubah');
        document.location.href = 'pemetaan.php';
        </script>";
    }   else {
        echo "<script>
        alert('Data Gagal Diubah');
        document.location.href = 'edit_penginapan.php';
        </script>";
    }
}

?>
<!-- Page Content --> 
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Penginapan</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Input</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?php
                        $id = $_GET['id'];
                        $query = $conn->query("SELECT * FROM penginapan WHERE id='$id'");
                        $latitude = '';
                        $longitude = '';
                        if ($query->num_rows > 0) {
                            $row = $query->fetch_row();
    
                            $latitude = $row[6];
                            $longitude = $row[7];
                        ?>
                                <form action="" method="POST">
                                <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $row[1]; ?>" autofocus required>
                                </div>
                                </div>
                                <hr>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat Penginapan<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat" value="<?= $row[2]; ?>" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="item gorm-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kecamatan<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="kecamatan" id="inputState" class="form-control">
                                        <option selected><?= $row[3]; ?></option>
                                            <?php
                                            $kec = $conn->query("SELECT * FROM kecamatan");
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No Telepon<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" name="no_hp" placeholder="Masukkan No Telpon" value="<?= $row[4]; ?>" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Harga<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Masukkan Harga"
                                        name="harga" value="<?= $row[5]; ?>" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Latutide<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="latitude" name="latitude" value="<?=$latitude; ?>"></input>
                                    </div>
                                </div>
                                <hr>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Longitude<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $longitude; ?>">
                                    </div>
                                </div>
                                    <div class="item form-group">
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button class="btn btn-primary" type="reset">RESET</button>
                                            <button type="submit" class="btn btn-success" name="edit">SUBMIT</button>
                                        </div>
                                    </div>
                                </form>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
<?php include 'template/footer.php' ?>
