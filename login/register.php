<?php 
 
include '../config/koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['email'])) {
    header("Location:login.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM login WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO login (email, nama, username, password)
                    VALUES ('$email', '$nama', '$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $email = "";
                $nama = "";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg2.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Register</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form action=" " class="signin-form" method="POST">  
                  <!-- method post artinya kirim ke db -->
                  <div class="form-group">
		      			<input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo $email; ?>" required>
		      		</div>
                      <div class="form-group">
		      			<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama; ?>" required>
		      		</div>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control"  name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>

                <div class="form-group">
	              <input id="password-field" type="password" class="form-control" name="cpassword" placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3" name="submit">Daftar</button>
	            </div>
                
	          </form>
	          <center><b><font color="black"><u><a href="login.php">back to menu login</a></u></h6></a></i></b></font></center>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

