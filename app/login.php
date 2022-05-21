<?php
	session_start();

	if (isset($_SESSION["current_user"])) {
		return header("Location: home.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login • BizKod</title>
  <?php include "../components/head.php"; ?>
</head>
<body>
	<div class="col-md-6 col-sm-8 mx-auto p-3 px-sm-0">
		<h3 class="text-primary">Login</h3>
		<hr style="border-top:1px dotted #ccc;"/>

		<?php
      include "../components/alert.php";

      $has_inputs = isset($_SESSION["inputs"]);
      $inputs = $has_inputs ? $_SESSION["inputs"] : null;
    ?>

		<form action="login-query.php" method="POST">
			<h4 class="text-success">Login here...</h4>
			<hr style="border-top: 1px groovy #000;">

			<div class="form-group mb-3">
				<label class="form-label">Email</label>
				<input type="email" class="form-control" name="email" placeholder="example@email.com" value="<?php echo $has_inputs ? $inputs["email"] : ""; ?>" required />
			</div>

			<div class="form-group mb-3">
				<label class="form-label">Password</label>
				<input type="password" class="form-control" name="password" placeholder="password..." required />
			</div>

			<br />

			<a href="send-reset-password.php">Forget password?</a>

			<br />
			<br />

			<div class="form-group mb-3">
				<button type="submit" class="btn btn-primary form-control" name="login">Login</button>
			</div>

			<a href="registration.php">Registration</a>
		</form>

		<?php unset($_SESSION["inputs"]) ?>
	</div>
</body>
</html>
