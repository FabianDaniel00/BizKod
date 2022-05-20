<?php
	session_start();

	if (isset($_SESSION["current_user"])) {
		return header("location: home.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration • BizKod</title>
  <?php include "../components/header.php"; ?>
</head>
<body>
	<div class="col-md-6 col-sm-8 mx-auto p-3 px-sm-0">
		<h3 class="text-primary">PHP - PDO Registration</h3>
		<hr style="border-top:1px dotted #ccc;"/>

		<?php
      include "../components/alert.php";

      $has_inputs = isset($_SESSION["inputs"]);
      $inputs = $has_inputs ? $_SESSION["inputs"] : null;
    ?>

		<form action="registration-query.php" method="POST">
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
</body>
</html>
