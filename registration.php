<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration • BizKod</title>
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
		<h3 class="text-primary">PHP - PDO Registration</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-8 mx-auto">
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

				$has_inputs = isset($_SESSION["inputs"]);
				$inputs = $has_inputs ? $_SESSION["inputs"] : null;
			?>

			<form action="register_query.php" method="POST">
				<h4 class="text-success">Register here...</h4>
				<hr style="border-top: 1px groovy #000;">

				<div class="form-group mb-3">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="email" placeholder="example@mail.com" value="<?php echo $has_inputs ? $inputs["email"] : ""; ?>" required />
				</div>

				<div class="form-group mb-3">
					<label class="form-label">Firstname</label>
					<input type="text" class="form-control" name="firstname" placeholder="Jon" value="<?php echo $has_inputs ? $inputs["firstname"] : ""; ?>" required />
				</div>

				<div class="form- mb-3">
					<label class="form-label">Lastname</label>
					<input type="text" class="form-control" name="lastname" placeholder="Doe" value="<?php echo $has_inputs ? $inputs["lastname"] : ""; ?>" required />
				</div>

				<div class="form-group mb-3">
					<label class="form-label">Password</label>
					<input type="password" class="form-control" name="password" placeholder="password..." minlength="6" required />
				</div>

				<div class="form-group mb-3">
					<label class="form-label">Confirm Password</label>
					<input type="password" class="form-control" name="confirm_password" placeholder="confirm password..." minlength="6" required />
				</div>

				<br />

				<div class="form-group mb-3">
					<button type="submit" class="btn btn-primary form-control" name="register">Register</button>
				</div>

				<a href="index.php">Login</a>
			</form>

			<?php unset($_SESSION["inputs"]) ?>
		</div>
	</div>
</body>
</html>
