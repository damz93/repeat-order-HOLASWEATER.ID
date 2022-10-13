<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Detail Data Pelanggan - RepeatOrder - holasweater.id</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/freelancer.css">
		<link rel="shortcut icon" href="img/hola_ic.png">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
		<style>
			body {margin:0;
			}
			.navbar_top {
			vertical-align: super;
			padding-top: 15px;
			background-color: #284d58;
			position: fixed;
			top: 0;
			width: 100%;
			height: auto;
			text-align:center;
			}
			.navbar_bot {
			background-color: #284d58;
			position: fixed;
			height: auto;
			bottom: 0px;
			color:white;
			width: 100%;
			padding:5px;
			text-align:center;
			}
			.res2{
			width:100%;
			max-width:75%;
			height:auto;
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-top: auto;
			margin-bottom: 0px;
			padding: 10px;
			}
			.main {;
			padding-top: 150px;
			height: auto;
			margin-bottom: 80px;
			}
		</style>
	</head>
	<body>
		<?php 
			error_reporting(0);
			    session_start();					
				
					$phone = $_GET['phone'];
			    if($_SESSION['status']!="login"){
			    	echo "<script>alert('Login terlebih dahulu...');window.location.href='index?pesan=belum_login';</script>";                    
			    }
			?> 
			
			
		<div class="main">
		<p style="width:220px;font-size:14pt;background-color:#284d58;color:#FFFFFF;">&nbsp Phone : <?php echo $phone; ?></p>
		<p style="width:150px;font-size:10pt;background-color:#284d58;color:#FFFFFF;">&nbsp Penginputan Transaksi </p>
			<table id="tabel1_" class="table table-striped table-hover" border="1" cellpadding="0" cellspacing="1">
				<thead align="center">
					<tr align='center' class="table-info">
						<th>No.</th>
						<th>Kode Transaksi</th>
						<th>Waktu Input</th>
					</tr>
				</thead>
				<?php 
					include 'bantuan/koneksi.php';
					$no=1;
					function formatTanggal($date){
						return date('d-m-Y', strtotime($date));
					}	

					$data1 = mysqli_query($koneksi,"select * from ro_log_data WHERE PHONE='$phone' order by ID DESC");
						while($d = mysqli_fetch_array($data1)){
							$tgl = formatTanggal($d['TGL']);  
							$hari = date('l', strtotime($d['TGL']));					
							$jam = substr($d['WAKTU'],11,11);
							//$semua = $hari.", ".$tgl." - ".$jam;
							$semua = $tgl." - ".$jam;
							
							$phone = $d['PHONE'];
							$oleh = $d['OLEH'];
							$kod_trx = $d['KODE_TRX'];
								
							?>
				<tr align="center">
					<td><?php echo $no++; ?></td>
					<td align="center"><?php echo $kod_trx; ?></td>
					<td align="center"><?php echo $semua; ?></td>
				</tr>
				<?php 
					}
					?>
			</table>
            <br>
		<p style="width:150px;font-size:10pt;background-color:#284d58;color:#FFFFFF;">&nbsp Pemakaian Transaksi </p>
			<table id="tabel1_" class="table table-striped table-hover" border="1" cellpadding="0" cellspacing="1">
				<thead align="center">
					<tr align='center' class="table-info">
						<th>No.</th>
						<th>Jumlah Pakai</th>
						<th>Waktu Pakai</th>
					</tr>
				</thead>
				<?php 
					include 'bantuan/koneksi.php';
					$no=1;

					$data2 = mysqli_query($koneksi,"select * from ro_data_transaksi WHERE PHONE='$phone' order by ID DESC");
					//$data = mysqli_query($koneksi,"SELECT ro_data_transaksi.PHONE,ro_data_transaksi.JUMLAH_PEMAKAIAN FROM ro_data_transaksi INNER JOIN ro_log_data ON ro_data_transaksi.PHONE=ro_log_data.PHONE");
						while($d = mysqli_fetch_array($data2)){
							$tgl = formatTanggal($d['TGL']);  
							$hari = date('l', strtotime($d['TGL']));					
							$jam = substr($d['WAKTU'],11,11);
							//$semua = $hari.", ".$tgl." - ".$jam;
							$semua = $tgl." - ".$jam;
							
							$phone = $d['PHONE'];
							$oleh = $d['OLEH'];
							$jumpak = $d['JUMLAH_PEMAKAIAN'];
								
							?>
				<tr align="center">
					<td><?php echo $no++; ?></td>
					<td align="center"><?php echo $jumpak; ?></td>
					<td align="center"><?php echo $semua; ?></td>
				</tr>
				<?php 
					}
					?>
			</table>
			<script type="text/javascript">
				$(document).ready(function() {
				    //$("#tabel1").tablesorter();
				    $("#tabel1").DataTable({
				        "paging": true,
				        "ordering": true,
				        "info": true,
				        // });
				        //$("#tabel1").DataTable({
				        "language": {
				            "decimal": "",
				            "emptyTable": "Tidak ada data yang tersedia di tabel",
				            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ Inputan",
				            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 Inputan",
				            "infoFiltered": "(difilter dari _MAX_ total Inputan)",
				            "infoPostFix": "",
				            "thousands": ".",
				            "lengthMenu": "Menampilkan _MENU_ Data Pelanggan",
				            "loadingRecords": "memuat...",
				            "processing": "Sedang di proses...",
				            "search": "Pencarian:",
				            "zeroRecords": "Arsip tidak ditemukan",
				            "paginate": {
				                "first": "Pertama",
				                "last": "Terakhir",
				                "next": "Selanjutnya",
				                "previous": "Kembali"
				            },
				            "aria": {
				                "sortAscending": ": aktifkan urutan kolom ascending",
				                "sortDescending": ": aktifkan urutan kolom descending"
				            }
				        }
				    });
				});
			</script>
		</div>
		<div class="navbar_bot">
			<table id="tabel2" align="center" width="40%" border="0" cellpadding="0" cellspacing="1">
				<tr>		
					<td style="padding-right:8px">
						<a href="menu-utama" style="color:#6bcdec"> 
							<img align="right" style="display: block; margin: auto;height:60px;" title="Kembali ke Menu Utama" src="http://holasweater.id/repeat-order/img/home_k.png" alt="Back">
						</a>
					</td>
					
					<td style="padding-left:8px">
						<a href="rekap-data-pelanggan" style="color:#6bcdec"> 
							<img align="left" style="display: block; height:60px;" title="Rekap Data Pelanggan" src="http://holasweater.id/repeat-order/img/cust_k.png" alt="Back">							
						</a>
					</td>
					
				</tr>
			</table>
		</div>
		<div class="navbar_top">
			<p style="font-size:20pt;color:white"><b>DETAIL DATA PELANGGAN<br></b></p>
			<p style="font-size:14pt;color:#6bcdec">Repeat-Order holasweater.id</p>
		</div>
	</body>
</html>