<?php 
session_start();
include 'koneksi.php';
include 'fungsi.php';




 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>~Lisa's Costume~</title>
 	<link rel="stylesheet" href="css/bootstrap.css">
 </head>
 <body>
 	<form method="post">

<br><br><br><br><br><br>
 <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row text-center "><h3 class="panel-title">Login Pelanggan</h3></div>
                </div>
            <div class="panel-body">
                <form method="post">

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Masukkan password" name="password" class="form-control">
                    </div>

                   

                    <div class="row text-center "><button class="btn btn-primary" name="login">Login</button></div>
                </form>              
            </div>
        </div>
    </div>
</div>

 	</form>
 
<?php if(isset($_POST["login"])) 
	{
		$email = $_POST["email"];
		$password = $_POST["password"];

		$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email = '$email' AND password = '$password' ");

		$akunyangcocok = $ambil->num_rows;

		if ($akunyangcocok==1) 
		{
			$akun = $ambil->fetch_assoc();

			$_SESSION["login"] = $akun;

			echo "<script>alert('Anda berhasil login!')</script>";
			echo "<script>location='index.php';</script>";
		} else
		{
			echo "<script>alert('Anda gagal login! Coba lagi!')</script>";
			echo "<script>location='login.php';</script>";
		}
	}

	?>
  </body>
 </html>