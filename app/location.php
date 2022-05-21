<?php
	session_start();

	$from_admin = false;
  	$active_page = "location";

	require_once "../conn.php";

	$current_user = $_SESSION["current_user"];

	if (!isset($current_user)) {
		return header("Location: login.php");
	}

  $sql = "SELECT * FROM `location` WHERE `id` = ?;";
  $query = $conn->prepare($sql);
  $query->execute([$_GET["location-id"]]);

  $location = $query->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $location["name"]; ?> • BizKod</title>
  <?php include "../components/head.php"; ?>
</head>
<body>
	<?php include "../components/navbar.php"; ?>

	<div class="px-3 bg-white">
		<h3 class="text-primary"><?php echo $location["name"]; ?></h3>
		<hr style="border-top: 1px dotted #ccc;"/>

		<?php include "../components/alert.php"; ?>

    <iframe
      src="<?php echo $location["map"]; ?>"
      width="100%"
      height="500"
      class="shadow border-0 mb-3"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
    <div class="text-center">
      <img src="../images/map/<?php echo $location["picture"]; ?>" class="rounded-3 shadow" alt="<?php echo $location["name"]; ?>" width="500px" />
    </div>

    <hr class="custom-hr" />

		<form id="feedback-form" action="location-query.php" method="POST">
			<h4 class="text-success">Feedback</h4>
			<hr style="border-top: 1px groovy #000;">

			<div class="form-group mb-3">
				<label class="form-label">Message <sup class="text-danger">*</sup></label>
				<textarea class="form-control" form="feedback-form" name="message" rows="3" placeholder="Write what you think about this place..."></textarea>
			</div>

			<div class="form-group mb-3">
        <label class="form-label">Rateing <sup class="text-danger">*</sup></label>
        <div class="d-flex w-full justify-content-between text-muted">
          <span>1</span>
          <span>2</span>
          <span>3</span>
          <span>4</span>
          <span>5</span>
        </div>
        <input type="range" class="form-range" min="1" max="5" value="0">
      </div>

      <input type="hidden" name="location_id" value="<?php echo $location["id"]; ?>" />

			<div class="form-group mb-3">
				<button type="submit" class="btn btn-primary form-control" name="feedback">
          <i class="fa-solid fa-paper-plane"></i>
          Send
        </button>
			</div>
		</form>

    <h4 class="text-success">Feedbacks</h4>
		<hr style="border-top: 1px groovy #000;">

    <?php
      $sql = "SELECT * FROM `location_rating` WHERE `location_id` = ?;";
      $query = $conn->prepare($sql);
      $query->execute([$_GET["location-id"]]);

      $location = $query->fetch();
    ?>
	</div>

	<?php include "../components/footer.php"; ?>
</body>
</html>
