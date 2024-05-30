<?php
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM kecamatan WHERE id='$id'");
if ($query) {
    echo "<script>
    alert('Data Berhasil Dihapus');
    window.location.href = 'tambah_kec.php';
    </script>";
}   else {
    echo "<script>
    alert('Data Gagal Dihapus');
    window.location.href = 'tambah_kec.php';
    </script>";
}