<?php 

require 'koneksi.php';


function query($query)
{
global $koneksi;

	$ambil = $koneksi->query($query);
	$pecah = [];

	while ($pecah = $ambil->fetch_assoc()) 
	{
	$pecahbaru[] = $pecah; 
	}
	return $pecahbaru;
}

?>