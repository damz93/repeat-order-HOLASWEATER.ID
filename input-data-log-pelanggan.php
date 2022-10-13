<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Input Data Log Pelanggan - RepeatOrder - holasweater.id</title>
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
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
			.main {
			padding-top: 150px;
			height: auto;
			margin-bottom: 20px;
			}
		</style>
		
			  <script type="text/javascript">
			  function cek_dulu() {			
					var phone = document.getElementById("phone").value;
					var kode_trx = document.getElementById("KODE_TRX").value;
					var isi_teks = "Yakin untuk simpan?";
					
					
					if (phone==''){
						alert("Input Phone...");
						document.getElementById("phone").focus();
						return false; 
					}
					else if (kode_trx==''){
						alert("Input Kode Trx");
						document.getElementById("KODE_TRX").focus();
						return false; 
					}
						
					else{									
						return confirm(isi_teks);				
					}
				}			
				</script>
		<style>
			  ul{
				background-color:#eee;
				cursor:pointer;
				position: absolute;
				
				width: 50%;
			  }
			  li{
				padding:5px;
				border:thin solid #fff0f0;
				font-size:16pt;
			  }
			  li:hover{
				background-color:#6bcdec;
				font-size:16pt;
				
			  }
			</style>
			
				<script type="text/javascript">
					 $(document).ready(function(){  
						  $('#phone').keyup(function(){  
							   var query = $(this).val();  
							   if(query != '')  
							   {  
									$.ajax({  
										 url:"bantuan/list-auto-phone.php",  
										 method:"POST",  
										 data:{query:query},  
										 success:function(data)  
										 {  
											  $('#phonex').fadeIn();
											  $('#phonex').html(data);  
										 }  
									});  
							   }  
						  });  
						  $(document).on('click', 'li', function(){ 
								$('#phone').val($(this).text());  
								$('#phonex').fadeOut();  
						  });  
					 });  
				 </script>
				 
		 <script>
		 function isi_otomatis2(){		
				var phone = $("#phone").val();
				$("#phone").val(phone);
				//alert('Ok');
			}
		 </script>
		 <script>
            $(function() {
                $('#phone').autocomplete({
                    source: 'bantuan/list-auto-phone.php'
                });
            });
        </script>
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
			 <form method="post" action="bantuan/simpan-data-log-pelanggan" autocomplete="off" onsubmit="return cek_dulu()">
			 <div class="table-responsive">
				<div class="form-group">
				   <div class="container">
						<table style="width:100%" border="0" class="table table-borderless" cellpadding="2" cellspacing="2" align="center">
								 <div class="form-group">
									<tr>
									   <td><p style="font-size:14pt">Phone</p></td>
									   <td colspan="3"><input autofocus maxlength="40" onkeyup="inputTerbilang()" type="text" class="form-control form-control-lg angka" id="phone" name="phone" placeholder="Format : 08xxx"> 
									   
									   <script type="text/javascript">
											document.getElementById('phone').value = "<?php if ($_POST['phone']==''){ echo '';} else {echo $_POST['phone'];}?>";
										</script>
									   <div id="phonex" onclick="isi_otomatis2()"></div>
									   </td>
									</tr>
									<tr>
									   <td><p style="font-size:14pt">Kode Trx</p></td>
									   <td colspan="3"> <input id="KODE_TRX"  placeholder="Format : TRX-0000xx" class="form-control form-control-lg" maxlength="30" type="text" name="KODE_TRX">  </td>
									</tr>                    
									<tr align='center'>
									   <br>
									   <td colspan="4"><button type="submit" value="simpan" class="btn btn-primary btn-lg btn-block">Simpan</button></td>
									</tr>
									<tr align='center'>
									   <td colspan="4">
										  <button onclick="autofocuss()" type="reset" class="btn btn-danger btn-lg btn-block">Batal</button>
									   </td>
									</tr>
								 </div>

									   
						   </table>	
						</div>
					</div>
					</div>
				 </form>
				 
			  <script>
				 function autofocuss() {
					document.getElementById("phone").focus();
				 }
				  
			  </script>
			  
			  
			  
			  <script>
					function inputTerbilang() {
					  $('.angka').mask('00000000000000', {reverse: true});
					} 
				</script>		
				<script src="js/jquery-1.11.2.min.js"></script>
				<script src="js/jquery.mask.min.js"></script>
				<script src="js/terbilang.js"></script>
			  
			  
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
						<a href="data-log-pelanggan" style="color:#6bcdec"> 
							<img align="left" style="display: block; height:60px;" title="Lihat Data Log Pelanggan" src="http://holasweater.id/repeat-order/img/data_k.png" alt="Back">
							<div class="caption">
									<!--<p style="font-size:8pt;color:#6bcdec;" align="center">ke Menu Utama</p>-->
							</div>
						</a>
					</td>
					
				</tr>
			</table>
		</div>
		<div class="navbar_top">
			<p style="font-size:20pt;color:white" align="center"><b>INPUT DATA LOG PELANGGAN<br></b></p>
			<p style="font-size:14pt;color:#6bcdec" align="center">Repeat-Order holasweater.id</p>
		</div>
	</body>
</html>