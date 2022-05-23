<?php
	session_start();

	if (isset($_SESSION["current_user"])) {
		return header("Location: home.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Send Reset Password • BizKod</title>
  <?php include "../components/head.php"; ?>
</head>
<body>
	<div class="col-md-6 col-sm-8 mx-auto p-3 px-sm-0">
		<h3 class="text-primary">Send Reset passsword</h3>
		<hr style="border-top:1px dotted #ccc;"/>

		<?php
      include "../components/alert.php";

      $has_inputs = isset($_SESSION["inputs"]);
      $inputs = $has_inputs ? $_SESSION["inputs"] : null;
    ?>

		<form action="send-reset-password-query.php" method="POST">
			<h4 class="text-success">Send Reset Password here...</h4>
			<hr style="border-top: 1px groovy #000;">

			<div class="form-group mb-3">
				<label class="form-label" for="email">Your Email</label>
				<input id="email" type="email" class="form-control" name="email" placeholder="example@email.com" value="<?php echo $has_inputs ? $inputs["email"] : ""; ?>" required />
			</div>

			<br />

			<div class="form-group mb-3">
				<button type="submit" class="btn btn-primary form-control" name="send-reset-password">Send Reset Password</button>
			</div>

			<a href="login.php">Login</a>
		</form>

		<?php unset($_SESSION["inputs"]) ?>
	</div>
</body>
</html>
