<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Input Transaksi - RepeatOrder - holasweater.id</title>
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
											  $('#phonexx').fadeIn();
											  $('#phonexx').html(data);  
										 }  
									});  
							   }  
						  });  
						  $(document).on('click', 'li', function(){ 
								$('#phone').val($(this).text());  
								$('#phonexx').fadeOut();  
						  });  
					 });  
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
			 <form method="post" action="bantuan/simpan-transaksi" autocomplete="off" onsubmit="return cek_dulu()">
			 <div class="table-responsive">
				<div class="form-group">
				   <div class="container">
						<table style="width:100%" border="0" class="table table-borderless" cellpadding="2" cellspacing="2" align="center">
								 <div class="form-group">
									<tr>
										<td>
											<p style="font-size:14pt">Phone</p>
										</td>
										<td colspan="3">
											<input onkeyup="inputTerbilang();" autofocus maxlength="40" type="text" class="form-control form-control-lg  mata-uang" id="phone" onfocus="samakannamax();" name="phone" placeholder="Format : 08xxx"> 										   
											<div id="phonexx" onclick="isi_otomatis2();"></div>
										</td>
									</tr>
									<tr>
									   <td><p style="font-size:14pt">Jumlah TRX</p></td>
									   <td colspan="3"> <input id="jum_trx" readonly="readonly" value="0" class="form-control form-control-lg" type="text" name="jum_trx">  </td>
									</tr>                    
									<tr>
										<td>
											<p style="font-size:14pt">Pilih Potongan</p>
										</td>
										<td colspan="3"> 
											<select onchange="cek_value();" onfocus="samakannamax();" class="form-control form-control-lg" name="potongan" id="potongan">
												<option value="0">Pilih Potongan</option>
												<option value="pot7">Potongan 7 Ribu</option>
												<option value="pot30">Potongan 30 Ribu</option>
												<option value="potcg">Crewneck Gratis</option>
											</select>
									   </td>
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
				  <script type="text/javascript">
			  function cek_dulu() {			
					var phone = document.getElementById("phone").value;
					var potongan = document.getElementById("potongan").value;
					var jum_tr = document.getElementById("jum_trx").value;
					var isi_teks = "Yakin untuk simpan?";
					
					
					if (phone==''){
						alert("Input Phone...");
						document.getElementById("phone").focus();
						return false; 
					}				
					else if (jum_tr==''){
						alert("Phone belum terdaftar...");
						document.getElementById("phone").value = '';
						document.getElementById("phone").focus();
						return false; 
					}						
					else if (potongan=='0'){
						alert("Pilih Potongan");
						document.getElementById("potongan").focus();
						return false; 
					}						
					else{
						return confirm(isi_teks);				
					}
				}			
			</script> 
			  <script>
				 function autofocuss() {
					document.getElementById("phone").focus();
					document.getElementById("jum_trx").value="0";
				 }
				  
			  </script>
			  
			  
	  
			<script type="text/javascript">
				function samakannamax(){		
					var phone = $("#phone").val();					
				//	alert(phone);
					$.ajax({
						url: 'bantuan/list-cek-jumlah.php',
						type: 'GET',
						data     : 'phonex='+phone,
						success: function (data) {
						var json = data,
						obj = JSON.parse(json);
						$('#jum_trx').val(obj.jum_trx);
						var anuh = $('#phone').val();
						//	alert(anuh);
						if (anuh.length == 0){
							document.getElementById("phone").focus();
						//	alert('Input Phone terlebih dahulu')
						}
						else{
							document.getElementById("potongan").focus();
						}
						
						}
					}).autocomplete({
					});
				}
				function isi_otomatis2(){		
					var phone = $("#phonexx").val();					
			//		alert(phone);
					document.getElementById("jum_trx").focus();
					document.getElementById("phone").focus();
					$.ajax({
						url: 'bantuan/list-cek-jumlah.php',
						type: 'GET',
						data     : 'phonex='+phone,
						success: function (data) {
						var json = data,
						obj = JSON.parse(json);
						$('#jum_trx').val(obj.jum_trx);
						}
					}).autocomplete({
					});
				}
			</script> 
			<script> 
				function cek_value(){
					var isi = $("#potongan").val();
					var jum = $("#jum_trx").val();
					var jumnilai = parseInt(jum);
					if (isi == "pot7" && jumnilai < 1){
						alert("Jumlah Tx tidak cukup");
						$("#potongan").val("0");
						$("#potongan").focus;
					}
					else if (isi == "pot30" && jumnilai < 3){
						alert("Jumlah Tx tidak cukup");
						$("#potongan").val("0");
						$("#potongan").focus;
					}
					else if (isi == "potcg" && jumnilai < 5){
						alert("Jumlah Tx tidak cukup");
						$("#potongan").val("0");
						$("#potongan").focus;
					}
					
				}
			</script> 
			  <script>
			function inputTerbilang() {
			  $('.mata-uang').mask('00000000000000', {reverse: true});
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
						<a href="data-transaksi" style="color:#6bcdec"> 
							<img align="left" style="display: block; height:60px;" title="Lihat Transaksi" src="http://holasweater.id/repeat-order/img/trx_k.png" alt="Back">
							<div class="caption">
									<!--<p style="font-size:8pt;color:#6bcdec;" align="center">ke Menu Utama</p>-->
							</div>
						</a>
					</td>
					
				</tr>
			</table>
		</div>
		<div class="navbar_top">
			<p style="font-size:20pt;color:white" align="center"><b>INPUT TRANSAKSI<br></b></p>
			<p style="font-size:14pt;color:#6bcdec" align="center">Repeat-Order holasweater.id</p>
		</div>
		
		
		
	</body>
</html>