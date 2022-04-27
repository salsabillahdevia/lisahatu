<?php 

session_start();
include 'koneksi.php';

$user = $_SESSION["login"]['nama'];


$id_pelanggan = $_SESSION["login"]['id_pelanggan'];
$ambil = $koneksi->query("SELECT * FROM pinjam WHERE id_pelanggan = '$id_pelanggan' ");
$pecah = $ambil->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Eli's|Daftar Peminjaman</title>
	<link rel="stylesheet"  href="css/bootstrap.css">
</head>
<body>
<?php include 'navBar.php'; ?>

	<h1 style="text-align: center;font-family: monotype corsiva;color:#428bca">Daftar Peminjaman <?php echo $user; ?></h1>
	<br><br>

<div class="container">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Produk</th>
				<th>Tanggal peminjaman</th>
				<th>Tanggal Pengembalian</th>
				<th>Harga</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$no = 1;
		while ($produk = $ambil->fetch_assoc()) :

		$id_produk = $produk['id_produk'];
		$ambilp = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk' ");
		$pecahp = $ambilp->fetch_assoc();


		$ambilpinjam = $koneksi->query("SELECT * FROM pinjam WHERE id_pelanggan = '$id_pelanggan' ");
		$id_peminjaman = $produk['id_peminjaman'];
		
		?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $pecahp['nama_produk']; ?></td>
				<td><?php echo $produk['tgl_peminjaman']; ?></td>
				<td><?php echo $produk['tgl_pengembalian']; ?></td>
				<td>Rp. <?php echo $produk['harga']; ?></td>
				<td>
					<button class="btn btn-primary"><a href="detail.php?id=<?php echo $id_peminjaman; ?>" style="color: white">Detail</a></button>
				</td>
			</tr>
		</tbody>
		<?php $no++; ?>
	<?php endwhile; ?>
	</table>
</div>
</body>
</html>