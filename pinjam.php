<?php
session_start(); 
include 'koneksi.php';

if (!isset($_SESSION["login"]))
{
	echo "<script>alert('Silahkan login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";	
    exit();
}


$id_produk = $_GET['id'];

$produk = $koneksi->query("SELECT * From produk WHERE id_produk = '$id_produk'");
$pecahproduk = $produk->fetch_assoc();

$user = $_SESSION["login"]['nama'];


$tgl_peminjaman = date("d-m-Y");

$id = $id_produk;

$nama_produk = $pecahproduk['nama_produk'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman~Lisa's Costume~</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<?php include 'navBar.php'; ?>

<div class="container">
	<h1>Masukan Data</h1>
	<hr size="1">
	<br>
<div class="form-group">
<form method="post">
	<div class="col-md-4">
		<label >Nama Pelanggan : </label>
			<input class="form-control" type="text" name="nama" style="width: 300px"  readonly value="<?php echo $user; ?>">
	</div>
		
	<div class="col-md-7">	
		<label>Nama Produk : </label>
			<input class="form-control" type="text" name="nama_produk" style="width: 350px" readonly value="<?php echo $nama_produk; ?>">
		<br>
	</div>

		<br><br>
	<div class="col-md-4">
		<label>Tanggal Peminjaman : </label>
			<input class="form-control" style="width: 150px" type="text" name="tgl_peminjaman" readonly value="<?php echo $tgl_peminjaman; ?>">
	</div>

	<div class="col-md-4">
		<label style="margin-left: -200px">Tanggal Pengembalian : </label>
			<input class="form-control" style="width: 200px;margin-left: -200px" type="date" name="tgl_pengembalian" >
	</div>

	<div class="col-md-2">
		<label style="margin-left: -340px">Harga(Rp.) : </label>
			<input class="form-control" type="text" name="harga" style="width: 200px;margin-left: -340px"  readonly value="<?php echo number_format($pecahproduk['harga']); ?>" >
	</div>
	<div class="col-md-4">	
		<br>
		<label>Masukan No.telepon : </label>
			<input class="form-control" type="text" name="telepon" autocomplete="off" size="30px" required="">
	</div>		

	<br><br>
	<div class="col-md-7">
		<label style="margin-top: 17px">Metode Pembayaran : </label>
			<select class="form-control" name="metode" required="" style="width: 200px;margin-top: 2px">
				<option>Pilih Metode</option>
				<option value="DANA">DANA</option>
				<option value="OVO">OVO</option>
				<option value="T-Cash">T-Cash</option>
				<option value="GoPay">GoPay</option>
				<option value="Bayar langsung">Bayar langsung</option>
			</select>
	</div>

	<div class="col-md-2">	
		<br>
		<button style="margin-top: 14px;margin-left: 40px" class="btn btn-warning" type="submit" name="proses" >Proses</button>
	</div>

</form>
</div>
</div>

<?php if(isset($_POST["proses"]))
{
	$id_pelanggan = $_SESSION["login"]['id_pelanggan'];
	$id = $id_produk;
	$nama =$_POST["nama"];
	$tgl_peminjaman =$_POST["tgl_peminjaman"];
	$tgl_pengembalian =$_POST["tgl_pengembalian"];
	$harga =$_POST["harga"];
	$telepon =$_POST["telepon"];
	$metode =$_POST["metode"];

	$koneksi->query("INSERT INTO pinjam (id_pelanggan,id_produk,tgl_peminjaman,tgl_pengembalian,harga,metode,telepon) 
					VALUES 
	('$id_pelanggan','$id','$tgl_peminjaman','$tgl_pengembalian','$harga','$metode','$telepon') ");


	$id_peminjaman = $koneksi->insert_id;

	$koneksi->query("INSERT INTO pinjam_produk 
	(id_peminjaman,id_pelanggan,id_produk,tgl_peminjaman,tgl_pengembalian,harga,metode,telepon) 
					VALUES 
	('$id_peminjaman','$id_pelanggan','$id','$tgl_peminjaman','$tgl_pengembalian','$harga','$metode','$telepon') ");


	echo "<script>alert('Peminjaman berhasil! Silahkan datang ke Lisa's Store Costume!);</script>";
	echo "<script>location= 'daftarpinjam.php?id=$id_peminjaman';</script>";






}
 ?>

 </body>
 </html>