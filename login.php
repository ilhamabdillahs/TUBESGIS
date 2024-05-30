
<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: login.php");
    } else {
        echo "<script>alert('username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
<!DOCTYPE html>
<html lang="en">
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
	<link rel="stylesheet" type="text/css" href="..TUBESGIS/css/style1.css">

    <title>LOGINPAGE</title>
    
</head>
<body>
    <div class="header"></div>
    <div class="hero"></div>
    <div class="footer"></div>
    <div class="header">
            <div class="col-md-4">
                <div class="formhero">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h1>Log In</h1>
                            <form role="form">
                                <div class="form-group">
                                    <input type="username" class="form-control" id="username" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-lg"><a href="user/index.php">Back</a></button>
                                    <button type="submit" class="btn btn-submit btn-lg"><a      href="indexadmin.php">submit</a></button>
                                    <label for="daftar"><a href="daftar.php" ><h4>Belum Punya akun?</a></label>
                                </div>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</body>
</html>