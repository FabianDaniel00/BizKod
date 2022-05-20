<?php
	session_start();

	require_once "../conn.php";
	require_once "../functions.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["login"])) {
		$email = $_POST["email"];
		$plain_password = $_POST["password"];

		if ($email != "" && $plain_password != "") {
			$sql = "SELECT * FROM `user` WHERE `email` = ?;";
			$query = $conn->prepare($sql);
			$query->execute([$email]);

			$user = $query->fetch();

			if ($query->rowCount() > 0 && password_verify($plain_password, $user["password"])) {
				if (!$user["is_verified"]) {
					$conn = null;

					return send_message("You need to verify your email to login. Check your emails.", "danger", "index", [$email]);
				}

				$_SESSION["current_user"] = $user;

				return header("location: home.php");
			} else {
				$conn = null;

				return send_message("Invalid email or password.", "danger", "index", [$email]);
			}
		} else {
			$conn = null;

			return send_message("Please complete the required fields!", "danger", "index", [$email]);
		}
	}

	return header("location: index.php");
?>
