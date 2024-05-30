<?php
include 'template/header.php';
include 'koneksi.php';

if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama_kos'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($conn, "UPDATE alternative SET nama_kos='$nama', alamat='$alamat' WHERE id='$id'");

    if ($query) {
        echo "<script>
        alert('Data Berhasil Diubah');
        document.location.href = 'alternative.php';
        </script>";
    }   else {
        echo "<script>
        alert('Data Gagal Diubah !');
        document.location.href = 'edit_alternative.php';
        </script>";
    }
}
?>
<!-- Page Content --> 
<div class="right_col" role="main">
    <div class="">
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
                        <h2>Form Input</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?php
                        $id = $_GET['id'];
                        $query = mysqli_query($conn, "SELECT * FROM alternative WHERE id='$id'");
                        if ($query->num_rows > 0) :
                            while ($row = $query->fetch_assoc()) :
                        ?>
                                <form id="demo-form2" action="" method="POST">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-md-3 label-align" for="first-name">Nama Kos<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-md-6">
                                            <Input type="text" id="nama_kos" required="required" class="form-control" name="nama_kos" value="<?= $row['nama_kos']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-md-3 label-align" for="first-name">Alamat<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6">
                                            <Input type="text" id="alamat" required="required" class="form-control" name="alamat" value="<?= $row['alamat']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success" name="edit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content --> 
<?php include 'template/footer.php' ?>

                                

