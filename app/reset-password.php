<?php
	session_start();

	if (isset($_SESSION["current_user"])) {
		return header("Location: home.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password • BizKod</title>
  <?php include "../components/head.php"; ?>
</head>
<body>
	<div class="col-md-6 col-sm-8 mx-auto p-3 px-sm-0">
		<h3 class="text-primary">Reset passsword</h3>
		<hr style="border-top:1px dotted #ccc;"/>

		<?php include "../components/alert.php"; ?>

		<form action="reset-password-query.php" method="POST">
			<h4 class="text-success">Reset Password here...</h4>
			<hr style="border-top: 1px groovy #000;">

			<div class="form-group mb-3">
				<label class="form-label" for="password">New Password</label>
				<input id="password" type="password" class="form-control" name="password" placeholder="new password..." required />
			</div>

			<div class="form-group mb-3">
				<label class="form-label" for="confirm_password">Confirm New Password</label>
				<input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="confirm new password..." required />
			</div>

			<input type="hidden" name="verification_code" value="<?php echo $_GET["verification_code"]; ?>" />

			<br />

			<div class="form-group mb-3">
				<button type="submit" class="btn btn-primary form-control" name="reset-password">Reset Password</button>
			</div>

			<a href="login.php">Login</a>
		</form>
	</div>
</body>
</html>
