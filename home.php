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
	<nav class="navbar navbar-expand-md navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav me-auto mb-2 mb-md-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
					</li>
				</ul>
				<form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
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
						<button><i class="fa-solid fa-xmark"></i></button>
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
