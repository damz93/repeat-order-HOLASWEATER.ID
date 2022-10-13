<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Data Log Pelanggan - RepeatOrder - holasweater.id</title>
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
			margin-bottom: 50px;
			}
		</style>
	</head>
	<body>
		<?php 
			error_reporting(0);
			    session_start();					
			    if($_SESSION['status']!="login"){
			    	echo "<script>alert('Login terlebih dahulu...');window.location.href='index?pesan=belum_login';</script>";                    
			    }
			?> 
		<div class="main">
			<table id="tabel1" class="table table-striped table-hover" border="1" cellpadding="0" cellspacing="1">
				<thead align="center">
					<tr align='center' class="table-primary">
						<th>No.</th>
						<th>Phone</th>
						<th>Kode Transaksi</th>
						<th>Waktu Input</th>
						<th>Oleh</th>
					</tr>
				</thead>
				<?php 
					include 'bantuan/koneksi.php';
					$no=1;
					function formatTanggal($date){
						return date('d-m-Y', strtotime($date));
					}	

					$data = mysqli_query($koneksi,"select * from ro_log_data order by ID DESC");
						while($d = mysqli_fetch_array($data)){
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
					<td align="center"><?php echo $phone; ?></td>
					<td align="center"><?php echo $kod_trx; ?></td>
					<td align="center"><?php echo $semua; ?></td>
					<td align="center"><?php echo $oleh; ?></td>
					<!--<td hidden>			
						<a href='edit-stok?kode_barang=<?php echo $d['KODE_BARANG']; ?>' title="Edit Log Data Pelanggan">
						<img src="img/edit.png" class="img-responsive" height="100%"></a> 
						|
						<a href='hapus-stok?kode_barang=<?php echo $d['KODE_BARANG']; ?>' title="Delete Log Data Pelanggan" onclick="return confirm('Are you sure you want to delete?')"><img src="img/delete.png" height="100%" ></a>
					</td>-->
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
				            "lengthMenu": "Menampilkan _MENU_ Data Log Pelanggan",
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
							<div class="caption">
									<!--<p style="font-size:8pt;color:#6bcdec;" align="center">ke Menu Utama</p>-->
							</div>
						</a>
					</td>
					
					<td style="padding-left:8px">
						<a href="input-data-log-pelanggan" style="color:#6bcdec"> 
							<img align="left" style="display: block; height:60px;" title="Input Data Log Pelanggan" src="http://holasweater.id/repeat-order/img/data_k.png" alt="Back">
							<div class="caption">
									<!--<p style="font-size:8pt;color:#6bcdec;" align="center">ke Menu Utama</p>-->
							</div>
						</a>
					</td>
					
				</tr>
			</table>
		</div>
		<div class="navbar_top">
			<p style="font-size:20pt;color:white"><b>DATA LOG PELANGGAN<br></b></p>
			<p style="font-size:14pt;color:#6bcdec">Repeat-Order holasweater.id</p>
		</div>
	</body>
</html>