<?php 
include 'koneksi.php';




?>
<!--navbar-->
<nav class="nav navbar-default">
	<div class="container">
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>			
			


			
			<!--jika sudah login-->
			<?php if(isset($_SESSION["login"])): ?>
				
				<li><a href="daftarpinjam.php">Daftar Peminjaman</a></li>
				<li><a href="logout.php">Logout</a></li>
				<?php 
				$nama = $_SESSION["login"]['nama'];

				?>

				<li style="color: #428bca;font-size: 17px;padding: 15px;left: 500px">Selamat Datang <?php echo $nama; ?>-San!</li>
				


			<?php else: ?>
				<li><a href="login.php">Login</a><li>

			<?php endif ?>	
			<!-- kalo logout di klik -->
			<?php if(isset($_SESSION["logout"])) : ?>
			 <?php echo "<script>
			 	alert('Anda telah logout');
						</script>"; ?>
			<?php echo "<script>location='login.php';</script>"; ?>
			<?php exit(); ?> 
		<?php endif; ?>
				
			 
		</ul>
	</div>
</nav>