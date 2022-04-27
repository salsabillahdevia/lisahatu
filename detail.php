<?php 
session_start();
include 'koneksi.php';

$id_peminjaman = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pinjam WHERE id_peminjaman = '$id_peminjaman' ");
$pecah = $ambil->fetch_assoc();

$id_produk = $pecah['id_produk'];
$ambilp = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk' ");
$pecahp = $ambilp->fetch_assoc();

$user = $_SESSION["login"]['nama'];

$tgl = $pecah['tgl_pengembalian'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail | Lisa's Costume</title>
	<link rel="stylesheet"  href="css/bootstrap.css">
</head>
<body>
	<?php include 'navBar.php'; ?>

	<br><br><br>
	
	<div align="center" style="background-color: #428bca;font-family: times new roman;font-size: 25px">

	<br>
			
		<b class="form-group">Detail Pemesanan <?php echo $user; ?></b> <br>
		<p> -------------------------------------------------------- </p>
		<b><?php echo $pecahp['nama_produk']; ?></b> <br>
		Tanggal Peminjaman : <?php echo $pecah['tgl_peminjaman']; ?> <br>
		Tanggal Pengembalian : <?php echo $tgl; ?> <br>
		Rp. <?php echo $pecah['harga']; ?> <br>
		Pembayaran Melalui <?php echo $pecah['metode']; ?>

	<br><br>		
	</div>
	
</body>
</html>