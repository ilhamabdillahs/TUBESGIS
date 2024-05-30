<?php
include 'template/header.php';
include 'koneksi.php';
?>
<!-- Page Content --> 
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Penginapan</h3>
            </div>
        </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12">
                    <div class="x_content">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include 'koneksi.php';
                                    $query = $conn->query("SELECT * FROM penginapan ORDER BY kecamatan asc");
                                    $no = 1;
                                    if ($query->num_rows > 0) {
                                        while ($row = $query->fetch_row()) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row['1']; ?></td>
                                                <td><?= $row['2']; ?></td>
                                                <td><?= $row ['3']; ?></td>
                                                <td><?= $row ['4']; ?></td>
                                                <td>Rp.<?= $row ['5']; ?>/malam</td>
                                                <<td>
                                                <a class="btn btn-info" href="edit_penginapan.php?id=<?= $row[0]; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                <a class="btn btn-danger btn-hapus-penginapan" href="hapus_penginapan.php?id=<?= $row[0]; ?>"><i class="fa fa-trash"></i></a>
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
        </div>
    </div>
</div>
<!-- /Page Content --> 
<?php include 'template/footer.php' ?>

