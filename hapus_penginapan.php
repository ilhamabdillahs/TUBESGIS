<?php
include 'koneksi.php';
session_start();

$id = $_GET['id'];
$queryResult = $conn->query("DELETE FROM penginapan WHERE id='$id'");

if ($queryResult) {
    $_SESSION['pesan'] = 'Data penginapan berhasil dihapus';
    echo "<script>
    window.location.href = 'data_penginapan.php';
    </script>";
}