<?php 
session_start();
include 'koneksi.php';
include 'fungsi.php';

if (!isset($_SESSION["login"])) 
	{
	echo "
			<script>
				alert ('Login dulu yah!')
				document.location.href = 'login.php';
			</script>
		";
		exit;
	}

$ambil=$koneksi->query("SELECT * FROM produk");
$pecah=$ambil->fetch_assoc();

$pelanggan=$_SESSION["login"]['nama'];



 ?>


 <!DOCTYPE html>
<html>
<head>
	<title>~Lisa's Costume~</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<?php include 'navBar.php' ?>

	<div style="background-color: salmon">
	<marquee><h1>^_^ Welcome to Lisa's Costume ^_^</h1></marquee>
	</div>
	<br><br>
	<h3 style="font-family: monotype corsiva;text-align: center;color: #428bca">Hello <?php echo $pelanggan; ?>, What's your outfit today?</h3>
	<br><br>


<div class="container">
	<div class="row">

		<?php $i=1; ?>
		<?php foreach ($ambil as $produk) : ?>
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="foto/<?php echo $produk['foto']; ?>" style="width: 290px;height: 400px">
					<div class="caption">
						<h3><?php echo $produk['nama_produk']; ?></h3>
						<h5>Rp. <?php echo number_format($produk['harga']) ; ?></h5>
						<a href="pinjam.php?id=<?php echo $produk['id_produk']; ?>" class="btn btn-primary">Let's Dress</a>
					</div>
				</div>
			</div>	
		<?php $i++; ?>
	<?php endforeach; ?>


</div>
</div>

</body>
</html>

