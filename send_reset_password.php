<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Send Reset Password • BizKod</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="bootstrap5/css/bootstrap.css"/>
	<script type="text/javascript" src="bootstrap5/js/bootstrap.js"></script>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- <a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a> -->
		</div>
	</nav>

	<div class="col-md-6 mx-auto px-1 px-md-0">
		<h3 class="text-primary">PHP - PDO Send Reset passsword</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-8 mx-auto">
			<?php
				$alert = $_SESSION["alert"];

				if (isset($alert)):
					$alert_type = $alert["type"];
			?>
				<div class="alert alert-<?php echo $alert_type ?> msg">
					<?php echo $alert["content"] ?>
				</div>

				<script>
					setTimeout(() => {
						document.querySelector('.msg').remove();
					}, <?php echo $alert_type == "info" ? 5000 : 20000 ?>);
				</script>

			<?php
				endif;

				unset($_SESSION["alert"]);
			?>

			<form action="send_reset_password_query.php" method="POST">
				<h4 class="text-success">Send Reset Password here...</h4>
				<hr style="border-top: 1px groovy #000;">

				<div class="form-group mb-3">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="email" placeholder="example@email.com" required />
				</div>

				<br />

				<div class="form-group mb-3">
					<button type="submit" class="btn btn-primary form-control" name="send_reset_password">Send Reset Password</button>
				</div>

				<a href="index.php">Login</a>
			</form>
		</div>
	</div>
</body>
</html>
