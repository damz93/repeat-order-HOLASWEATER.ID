<html>
	<head>
		<title>Halaman Login - HOLASWEATER.ID</title>
		<link rel="shortcut icon" href="img/hola_ic.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<!--		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">-->
		<link rel="stylesheet" href="css/journ_bootstrap.min.css">
		
		<style>
			body,html{
			height:100%;
			margin:0;
			font-family: Arial, Helvetica, sans-serif;
			}
			.bg{
			/*background-image: url("img/bg_wood.png");*/
			background:#ffffff;
			opacity:.9;
			height:78%;
			background-position:center;
			background-repeat:no-repeat;
			margin-top:10px;
			padding-bottom:0px;
			background-size:cover;
			}
		</style>
		<style>img{opacity:.9}img:hover{opacity:1.0}</style>
		<style>a{opacity:.9}a:hover{opacity:1.0}</style>
		<style>.container{
			margin-bottom: 60px;
			padding-bottom: 30px;
			}
		</style>
	
		<style>.responsive{
			width:100%;
			max-width:150px;
			height:auto;
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-top: 0px;
			margin-bottom: 0px;
			}
		</style>
        <style>.res2{
			width:100%;
			max-width:300px;
			height:auto;
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-top: auto;
			margin-bottom: 5px;
			padding-right:20px;
			padding-left:20px;
			}
			.topnav {
				overflow: hidden;
				background-color: #284d58;
				position: fixed;
				text-align:center;			  
				vertical-align: middle;
				top: 0;
				width: 100%;;
				color:white;			  
				height:20%;
				padding-bottom:0px;
				padding-top:0px;
			}
            .center {
                margin: auto;
                width: 100%;
                padding: 15px;
                text-align:center;
                color: #FFFFFF;
                padding: 30px;
                background:#284d58 ;
			height:auto;
              }
		</style>
	</head>
	<body>
		<div class="center">
            <img src="https://holasweater.id/repeat-order/img/hola-tk.png" class="responsive">
		</div>
		<div class="bg">
		<br>
			<div id="login">
				<div class="container">
					<div id="login-row" class="row justify-content-center align-items-center">
						<div id="login-column" class="col-md-6">
							<div id="login-box" class="col-md-12">
								<form id="login-form" class="form" action="bantuan/cek-login" autocomplete="off" method="post">
									<div class="table-responsive">
										<div class="form-group">
											<div class="container">
												<table border="0" style="background-color:#f2f0f0" class="table table-borderless" cellpadding="2" cellspacing="2" align=center>
													<div class="form-group">
														<tr>
															<td colspan="2">
																	<h2 style="color:white;background:#6bcdec;padding:5px;"align="center">REPEAT-ORDER-LOGIN</h2>
																
															</td>
														</tr>
														<!--<label for="username" class="text-info">Username:</label><br>-->
														<tr>
															<td colspan="2">
																<input type="text" name="username" id="username"  class="form-control form-control-lg" placeholder="Username" autofocus>													
															</td>
														</tr>
														<tr>
															<td colspan="2">
																<input type="password" name="password" id="password"  class="form-control form-control-lg" placeholder="Password">										
															</td>
														</tr>
														<tr>
															<td colspan="2">
																<select class="form-control form-control-lg" name="level">
																	<option selected>Pilih Departement</option>
																	<option value="ACCOUNTING">Accounting</option>
																	<option value="ADMIN">Admin</option>
																	<option value="OWNER">CEO</option>
																	<option value="OFFLINE STORE">Offline Store</option>
																	<option value="ONLINE STORE">Online Store</option>
																	<option value="PURCHASING">Purchasing</option>
																	<option value="STAFF">Staff</option>
																	<option value="WAREHOUSE">Warehouse</option>
																	<option value="WEB DEVELOPER">Web Developer</option>
																</select>
															</td>
														</tr>
														<tr>
															<td width="100%">
																<input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="L O G I N">
															</td>
															<td hidden width="50%">
																<button type="reset" onclick="focuss()" class="btn btn-danger btn-block">Cancel</button>
															</td>
														</tr>
													</div>				
												</table>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
            function focuss() {
            	document.getElementById("username").focus();
            }
             
         </script>
	</body>
</html>