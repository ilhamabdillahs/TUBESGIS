<?php 
include('template/header.php') 
?>

<?php

    include 'koneksi.php';

    $id = $_GET['id'];

    $query = $conn->query("SELECT * FROM penginapan WHERE id='$id'");
    $row = $query->fetch_assoc();

    $nama = $row['nama'];
    $alamat = $row['alamat'];
    $kecematan = $row['kecamatan'];
    $no_hp = $row['no_hp'];
    $harga = $row['harga'];
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
?>
            <div class="page-content p-5 right_col" role="main" id="content">
                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <a href="pemetaan.php" class="btn btn-info">Kembali</a>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                Data Penginapan
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nama :<?= $nama; ?></li>
                                <li class="list-group-item">Alamat :<?= $alamat; ?></li>
                                <li class="list-group-item">Kecamatan :<?= $kecematan; ?></li>
                                <li class="list-group-item">No Telepon :<?= $no_hp; ?></li>
                                <li class="list-group-item">Harga :<?= $harga; ?></li>
                                <li class="list-group-item">Latitude :<?= $latitude; ?></li>
                                <li class="list-group-item">Longitude :<?= $longitude; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <! end content>
                <! footer>
                    <?php include('template/footer.php') ?>