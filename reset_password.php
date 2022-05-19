<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password • BizKod</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="bootstrap5/css/bootstrap.css"/>
	<script type="text/javascript" src="bootstrap5/js/bootstrap.js"></script>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<script src="js/app.js"></script>
	<link rel="stylesheet" href="style/app.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- <a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a> -->
		</div>
	</nav>

	<div class="col-md-6 mx-auto px-1 px-md-0">
		<h3 class="text-primary">PHP - PDO Reset passsword</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-8 mx-auto">
			<?php
				if (isset($_SESSION["alert"])):
					$alert = $_SESSION["alert"];
			?>

				<div class="msg d-none">
					<div class="alert alert-<?php echo $alert["type"] ?>">
						<?php echo $alert["content"] ?>
						<button><i class="fa-solid fa-xmark"></i></button>
					</div>
				</div>

			<?php
				endif;

				unset($_SESSION["alert"]);
			?>

			<form action="reset_password_query.php" method="POST">
				<h4 class="text-success">Reset Password here...</h4>
				<hr style="border-top: 1px groovy #000;">

        <div class="form-group mb-3">
					<label class="form-label">New Password</label>
					<input type="password" class="form-control" name="password" placeholder="new password..." required />
				</div>

				<div class="form-group mb-3">
					<label class="form-label">Confirm New Password</label>
					<input type="password" class="form-control" name="confirm_password" placeholder="confirm new password..." required />
				</div>

				<input type="hidden" name="verification_code" value="<?php echo $_GET["verification_code"] ?>" />

				<br />

				<div class="form-group mb-3">
					<button type="submit" class="btn btn-primary form-control" name="reset_password">Reset Password</button>
				</div>

				<a href="index.php">Login</a>
			</form>
		</div>
	</div>
</body>
</html>
