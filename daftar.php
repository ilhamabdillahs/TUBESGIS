<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: indexadmin.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, password)
                    VALUES ('$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 
<html>

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login form</title>
	<!-- di bawah ini source google font -->
	<style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@800&family=Roboto:wght@100&display=swap');</style>
	<!-- di bawah ini source bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- di bawah ini source style.css -->
        <link rel="stylesheet" href="../TUBESGIS/assets/css/style1.css">
        <title>Halaman Login</title>
    </head>
    <body>
        <div class="container">
            <form method="POST" action="../TUBESGIS/index.php">
            <div class="col-md-4">
                <div class="formhero">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <center>
                            <h1>Sign In</h1>
                            <form role="form">
                                <div class="form-group">
                                    <input type="username" class="form-control" id="username" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                </div>   
                                <button><a href="login.php">Daftar</a></button>
                                <p><h4> Sudah punya akun?
                                    <a href="login.php">Login di sini</a>
                                </h4></p>
                            </form>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>