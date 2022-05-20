<?php
	session_start();

	$from_admin = false;
  $active_page = "home";

	require_once "../conn.php";

	$current_user = $_SESSION["current_user"];

	if (!isset($current_user)) {
		return header("location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home • BizKod</title>
  <?php include "../components/header.php"; ?>
</head>
<body>
	<?php include "../components/navbar.php"; ?>

	<div class="px-3">
		<h3 class="text-primary">PHP - PDO Home</h3>
		<hr style="border-top: 1px dotted #ccc;"/>

		<h3>Welcome!</h3>

		<br />

		<?php include "../components/alert.php"; ?>

		<center>
			<h4>
				<?php echo $current_user["firstname"]." ". $current_user["lastname"]; ?>
			</h4>
		</center>
	</div>

	<?php include "../components/footer.php"; ?>
</body>
</html>
