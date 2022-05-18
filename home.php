<?php
	require "conn.php";

	session_start();

	$user = $_SESSION["user"];

	if (!isset($user)) {
		return header("location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home • BizKod</title>
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
		<h3 class="text-primary">PHP - PDO Home</h3>
		<hr style="border-top: 1px dotted #ccc;"/>
		<div class="col-md-10 mx-auto">
			<h3>Welcome!</h3>

			<br />

			<?php
				if (isset($_SESSION["alert"])):
					$alert = $_SESSION["alert"];
			?>

				<div class="msg d-none">
					<div class="alert alert-<?php echo $alert["type"] ?>">
						<?php echo $alert["content"] ?>
					</div>
				</div>

			<?php
				endif;

				unset($_SESSION["alert"]);
			?>

			<center>
				<h4>
					<?php echo $user["firstname"]." ". $user["lastname"] ?>
				</h4>
			</center>

			<a href="logout.php">Logout</a>
		</div>
	</div>
</body>
</html>
