<?php
	error_reporting(E_ERROR | E_PARSE);
	include 'koneksi.php';
	$phone = $_GET['phonex'];
	$query = mysqli_query($koneksi, "select * from ro_data_pelanggan where PHONE='".$phone."'");
	$barang = mysqli_fetch_array($query);
	$data = array(
				'phone'      =>  $barang['PHONE'],
				'jum_trx'      =>  $barang['JUMLAH_TRX'],);
	 echo json_encode($data);
?>