<?php
	session_start();

	require_once "../conn.php";
	require_once "../functions.php";

	$current_user = $_SESSION["current_user"];

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($current_user) && isset($_POST["feedback"])) {
		$location_id = $_POST["location_id"];
    $rating = $_POST["rating"];
		$message = $_POST["message"];

		if ($message != "" && $location_id != "" && $rating != "" && $rating != "0") {
			try {
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `location_rating` (`location_id`, `rating`, `message`, `user_id`) VALUES (?, ?, ?, ?);";
				$query = $conn->prepare($sql);
				$query->execute([
					$location_id,
					$rating,
          $message,
          $current_user["id"],
				]);

				if ($query->rowCount() > 0) {
          $insertedId = $conn->lastInsertId();
					$conn = null;

					return send_message("Feedback successfully sent.", "success", "location", [], "?location-id=".$location_id."#feedback-".$insertedId);
				} else {
					$conn = null;

					return send_message("Something went wrong. Try again.", "danger", "location", [$rating, $message], "?location-id=".$location_id."#custom-hr");
				}
			} catch (PDOException $e) {
				$conn = null;

				return send_message($e->getMessage(), "danger", "location", [$rating, $message], "?location-id=".$location_id."#custom-hr");
			}
		} else {
			$conn = null;

			return send_message("Please complete the required fields!", "danger", "location", [$rating, $message], "?location-id=".$location_id."#custom-hr");
		}
	}

	return header("Location: login.php");
?>
