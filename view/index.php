<!DOCTYPE html>
<html lang="en">


<head>
<title>LOGIN</title>

    <link rel="stylesheet" href="<?php echo DIR.PUB.DS?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo DIR.PUB.DS?>css/creative.css" type="text/css">
	
	<script src="<?php echo DIR.PUB.DS?>js/lumino.glyphs.js"></script>
</head>

<body>
		<div class="col-xs-12 wrapper-login" action="user_auth.php">
			<div class="login">
				<div class="white_arr">
						<h2>HOSPITAL INFORMATION SYSTEM</h2>
						<hr/>
				</div>
				<div class="login-form">
						<form action= "<?php echo DIR;?>login/auth"method="post">
								<div class="form-group">
									<input type="text" class="form-control" name="user_id" placeholder="User Identity" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>
									
									<button type="submit" class="btn btn-success" name="login">Login</button>
						</form>
				</div>
		    </div>
		</div>
	
    <!-- jQuery -->
    <script src="<?php echo DIR.PUB.DS?>js/jquery.js"></script>
    <script src="<?php echo DIR.PUB.DS?>js/bootstrap.min.js"></script>

</body>

</html>