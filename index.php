<?php
    session_start();
    if (isset($_GET['logout'])) {
        session_destroy();
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="util.css">
	<link rel="stylesheet" type="text/css" href="main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="loggin.php" method="post">
					<span class="login100-form-title p-b-43">
						 TOLEDO S.A LOGIN
 					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="usuario" required>
						<span class="focus-input100"></span>
						<span class="label-input100">usuario</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Contraseña</span>
					</div>
                                        
                                        

					<div class="flex-sb-m w-full p-t-3 p-b-32">
                                        
						<div class="contact100-form-checkbox">
							<!--<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
   -->						<!--	<label class="label-checkbox100" for="ckb1"> -->
							<!--	Remember me 
							</label> -->
						</div>

						<div>
							<a href="#" class="txt1">
							<!--	Forgot Password? -->
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Iniciar Sesion
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
						<!--	or sign up using -->
						</span>
					</div>

				
				</form>

				<div class="login100-more" style="background-image: url('bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	


</body>
</html>
