<?php
	include 'koneksi.php';
	date_default_timezone_set('Asia/Hong_Kong');
	session_start();
	$waktu_skg2 = date("d/m/Y h:i:s A");
	$tgl        = date("Y/m/d");
	$oleh       = $_SESSION['username'];
	$keterangan = "ditambah oleh " . $oleh . " pada tgl dan jam " . $waktu_skg2;
	$phone      = $_POST['phone'];
	$kode_trx   = $_POST['KODE_TRX'];	
	$data_tr = mysqli_query($koneksi, "SELECT ID,KODE_LOG FROM ro_log_data ORDER BY ID DESC LIMIT 1");
	while ($d = mysqli_fetch_array($data_tr)) {
		$jum_log = substr($d['KODE_LOG'], 5);
	}

	if ($jum_log == 0) {
		$kode_log = "LOG-0000000001";
	} else {
		$jum_log++;
		if (strlen($jum_log) == 1) {
			$kode_log = "LOG-000000000" . $jum_log;
		} else if (strlen($jum_log) == 2) {
			$kode_log = "LOG-00000000" . $jum_log;
		} else if (strlen($jum_log) == 3) {
			$kode_log = "LOG-0000000" . $jum_log;
		} else if (strlen($jum_log) == 4) {
			$kode_log = "LOG-000000" . $jum_log;
		} else if (strlen($jum_log) == 5) {
			$kode_log = "LOG-00000" . $jum_log;
		} else if (strlen($jum_log) == 6) {
			$kode_log = "LOG-0000" . $jum_log;
		} else if (strlen($jum_log) == 7) {
			$kode_log = "LOG-000" . $jum_log;
		} else if (strlen($jum_log) == 8) {
			$kode_log = "LOG-00" . $jum_log;
		} else if (strlen($jum_log) == 9) {
			$kode_log = "LOG-0" . $jum_log;
		} else if (strlen($jum_log) == 10) {
			$kode_log = "LOG-" . $jum_log;
		}
	}
	$query = "INSERT INTO ro_log_data(PHONE,KODE_TRX,KODE_LOG,KETERANGAN,TGL,WAKTU,OLEH)VALUES('$phone','$kode_trx','$kode_log','$keterangan','$tgl','$waktu_skg2','$oleh')";
	
	$cekdulu = "select * from ro_log_data where KODE_TRX='$kode_trx'";
	
			
	$cekdul = mysqli_query($koneksi, "select * from ro_log_data where KODE_TRX='$kode_trx'");
			
	$prosescek = mysqli_query($koneksi, $cekdulu);
	while ($d = mysqli_fetch_array($cekdul)) {
				$pemakai = $d['PHONE'];
			}
	if (mysqli_num_rows($prosescek)>0) {
		//echo "<script>alert('Kode Transaksi sudah diinput.');history.go(-1) </script>";
		$sudah = 'Kode Transaksi *'.$kode_trx.'* sudah diinput dengan nomor HP '.$pemakai;
		//echo "<script>alert('Kode Transaksi sudah diinput.');window.location.href='../input-data-log-pelanggan'; </script>";
		echo "<script>alert('".$sudah."');window.location.href='../input-data-log-pelanggan';</script>";
	}
	else {
		if (mysqli_query($koneksi, $query)) {
			
			
			$cekdulu2= "select PHONE,JUMLAH_TRX from ro_data_pelanggan where PHONE='$phone'";
				
			$prosescek2 = mysqli_query($koneksi, $cekdulu2);
			if (mysqli_num_rows($prosescek2)>0) {
				$keterangan_upd = "update terakhir oleh " . $oleh . " pada tgl dan jam " . $waktu_skg2;
					$data_plgn = mysqli_query($koneksi, $cekdulu2);
					while ($d = mysqli_fetch_array($data_plgn)) {
						$juml = $d['JUMLAH_TRX'];
					}
				$juml = $juml+1;
				$query_up_plg="UPDATE ro_data_pelanggan SET JUMLAH_TRX='$juml',KETERANGAN='$keterangan_upd',WAKTU='$waktu_skg2',OLEH='$oleh',TGL='$tgl' where PHONE='$phone'";
				mysqli_query($koneksi, $query_up_plg);
			}
			else{
				$keterangan_add = "ditambah pertama oleh " . $oleh . " pada tgl dan jam " . $waktu_skg2;
				$query_add_plg="INSERT INTO `ro_data_pelanggan`(`PHONE`, `JUMLAH_TRX`, `TGL`, `WAKTU`, `OLEH`, `KETERANGAN`) VALUES('$phone',1,'$tgl','$waktu_skg2','$oleh','$keterangan_add')";
				mysqli_query($koneksi, $query_add_plg);
			}
			
			echo "<script>alert('Data Tersimpan');window.location.href='../input-data-log-pelanggan';</script>";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
		}
	}
?>