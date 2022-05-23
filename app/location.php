<?php
	session_start();

	$from_admin = false;
  	$active_page = "location";

	require_once "../conn.php";

	$current_user = $_SESSION["current_user"];

	if (!isset($current_user)) {
		return header("Location: login.php");
	}

  $sql = "SELECT AVG(location_rating.rating) AS 'avg_rating', COUNT(location_rating.rating) AS 'rating_count', location.id, location.name, location.picture, location.description, location.type, location.map FROM `location` INNER JOIN `location_rating` ON location.id = location_rating.location_id WHERE location.id = ?;";
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
		<h3 class="text-primary mt-2"><?php echo $location["name"]; ?><i> (<?php echo $location["type"]; ?>)</i></h3>
		<hr style="border-top: 1px dotted #ccc;"/>

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
      <hr class="dashed-hr" />
      <div class="col-12 col-lg-8 mx-auto fs-5"><?php echo $location["description"]; ?></div>
      <hr class="dashed-hr" />

      <span class="d-flex gap-1 text-warning justify-content-center align-items-center my-2">
        <span class="text-black">Average rating: </span>
        <?php
          if ($location["rating_count"]):
            $full_star_count = (int) $location["avg_rating"];
            $deciamls = round($location["avg_rating"] - $full_star_count, 2);
            $has_half_star = $deciamls >= 0.25 && $deciamls <= 0.75 ? true : false;

            for ($i = 0; $i < $full_star_count; $i++):
        ?>
          <i class="fa-solid fa-star"></i>
        <?php
          endfor;

          echo $has_half_star ? '<i class="fa-solid fa-star-half"></i>' : "";
          echo '<span class="text-black">('.round($location["avg_rating"], 1).' out of '.$location["rating_count"].')</span>';
          else: echo '<span class="text-muted fst-italic">No rating yet</span>';
          endif;

          $has_inputs = isset($_SESSION["inputs"]);
          $inputs = $has_inputs ? $_SESSION["inputs"] : null;
        ?>
      </span>
      <img src="../images/map/<?php echo $location["picture"]; ?>" class="rounded-3 shadow my-2" alt="<?php echo $location["name"]; ?>" style="max-width: 500px; width: 100%;" />
    </div>

    <hr id="custom-hr" />

		<?php include "../components/alert.php"; ?>

		<form id="feedback-form" action="location-query.php" method="POST">
			<h4 class="text-success">Feedback</h4>
			<hr style="border-top: 1px groovy #000;">

			<div class="form-group mb-3">
				<label class="form-label">Message <span class="text-danger">*</span></label>
				<textarea class="form-control" form="feedback-form" name="message" rows="3" placeholder="Write what you think about this place..."><?php echo $has_inputs ? $inputs["message"] : ""; ?></textarea>
			</div>

			<div class="form-group mb-3">
        <label class="form-label">Rateing <span class="text-danger">*</span></label>
        <div class="d-flex w-full justify-content-between text-muted">
          <span>1</span>
          <span>2</span>
          <span>3</span>
          <span>4</span>
          <span>5</span>
        </div>
        <input type="range" name="rating" class="form-range" min="1" max="5" value="<?php echo $has_inputs ? $inputs["rating"] : "0"; ?>">
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
      $sql = "SELECT location_rating.id, location_rating.user_id, location_rating.rating, location_rating.message, location_rating.created_at, user.firstname, user.lastname FROM `location_rating` INNER JOIN `user` ON location_rating.user_id = user.id WHERE location_rating.location_id = ?;";
      $query = $conn->prepare($sql);
      $query->execute([$_GET["location-id"]]);

      while ($location_rating = $query->fetch()):
    ?>
      <div id="feedback-<?php echo $location_rating["id"]; ?>" class="my-3 d-flex gap-3">
        <div class="rounded-circle d-flex justify-content-center align-items-center shadow fw-bold" style="height: 50px; width: 50px; background-color: #94ABD6;">
            <?php echo strtoupper(substr($location_rating["firstname"], 0, 1).substr($location_rating["lastname"], 0, 1)) ?>
        </div>

        <div class="w-100">
          <div>
            <div class="d-flex justify-content-between">
              <div>
                <b<?php echo $location_rating["user_id"] == $current_user["id"] ? ' class="text-success"' : "" ?>><?php echo $location_rating["firstname"]." ".$location_rating["lastname"]; ?></b>
                <span class="d-block d-md-inline-block">
                  <?php for ($i = 0; $i < $location_rating["rating"]; $i++): ?>
                    <i class="fa-solid fa-star text-warning"></i>
                  <?php endfor; ?>
                </span>
              </div>
              <div class="text-muted fs-6"><?php echo $location_rating["created_at"]; ?></div>
            </div>
            <div>
              <?php echo $location_rating["message"]; ?>
            </div>
          </div>
        </div>
      </div>
    <?php
      endwhile;

      if ($query->rowCount() < 1):
    ?>
      <div class="text-center">
        No feedbacks yet!
      </div>
    <?php
      endif;

      unset($_SESSION["inputs"]);
    ?>
	</div>

	<?php include "../components/footer.php"; ?>
</body>
</html>
