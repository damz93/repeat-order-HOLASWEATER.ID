<?php
	include 'koneksi.php';
	date_default_timezone_set('Asia/Hong_Kong');
	session_start();
	$waktu_skg2 = date("d/m/Y h:i:s A");
	$tgl        = date("Y/m/d");
	$oleh       = $_SESSION['username'];
	$keterangan = "ditambah oleh " . $oleh . " pada tgl dan jam " . $waktu_skg2;
	$phone      = $_POST['phone'];
	$pot      = $_POST['potongan'];
	if($pot=='pot7'){
		$juml_pakai = 1;
	}
	else if($pot=='pot30'){
		$juml_pakai = 3;
	}
	else if($pot=='potcg'){
		$juml_pakai = 5;
	}
	
	$data_tr = mysqli_query($koneksi, "SELECT ID,KODE_TRX FROM ro_data_transaksi ORDER BY ID DESC LIMIT 1");
	while ($d = mysqli_fetch_array($data_tr)) {
		$jum_log = substr($d['KODE_TRX'], 5);
	}

	if ($jum_log == 0) {
		$kode_trx = "TRX-0000000001";
	} else {
		$jum_log++;
		if (strlen($jum_log) == 1) {
			$kode_trx = "TRX-000000000" . $jum_log;
		} else if (strlen($jum_log) == 2) {
			$kode_trx = "TRX-00000000" . $jum_log;
		} else if (strlen($jum_log) == 3) {
			$kode_trx = "TRX-0000000" . $jum_log;
		} else if (strlen($jum_log) == 4) {
			$kode_trx = "TRX-000000" . $jum_log;
		} else if (strlen($jum_log) == 5) {
			$kode_trx = "TRX-00000" . $jum_log;
		} else if (strlen($jum_log) == 6) {
			$kode_trx = "TRX-0000" . $jum_log;
		} else if (strlen($jum_log) == 7) {
			$kode_trx = "TRX-000" . $jum_log;
		} else if (strlen($jum_log) == 8) {
			$kode_trx = "TRX-00" . $jum_log;
		} else if (strlen($jum_log) == 9) {
			$kode_trx = "TRX-0" . $jum_log;
		} else if (strlen($jum_log) == 10) {
			$kode_trx = "TRX-" . $jum_log;
		}
	}
	$query = "INSERT INTO ro_data_transaksi(PHONE,KODE_TRX,JUMLAH_PEMAKAIAN,KETERANGAN,TGL,WAKTU,OLEH)VALUES('$phone','$kode_trx','$juml_pakai','$keterangan','$tgl','$waktu_skg2','$oleh')";
	
	
		if (mysqli_query($koneksi, $query)) {
			
			
			$cekdulu2= "select PHONE,JUMLAH_TRX from ro_data_pelanggan where PHONE='$phone'";
		
			$prosescek2 = mysqli_query($koneksi, $cekdulu2);
			if (mysqli_num_rows($prosescek2)>0) {
				$keterangan_upd = "update terakhir oleh " . $oleh . " pada tgl dan jam " . $waktu_skg2;
					$data_plgn = mysqli_query($koneksi, $cekdulu2);
					while ($d = mysqli_fetch_array($data_plgn)) {
						$juml = $d['JUMLAH_TRX'];
					}
				$juml = $juml-$juml_pakai;
				$query_up_plg="UPDATE ro_data_pelanggan SET JUMLAH_TRX='$juml',KETERANGAN='$keterangan_upd',WAKTU='$waktu_skg2',OLEH='$oleh',TGL='$tgl' where PHONE='$phone'";
				mysqli_query($koneksi, $query_up_plg);
			}
			
			echo "<script>alert('Data Tersimpan');window.location.href='../input-transaksi';</script>";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
		}
	
?>