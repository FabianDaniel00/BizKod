<?php
	session_start();

	require_once "../conn.php";
	require_once "../functions.php";

	$current_user = $_SESSION["current_user"];

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($current_user) && isset($_POST["feedback"])) {
		$message = $_POST["message"];

		if ($message != "") {
      $message = $_POST["message"];

			try {
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `user` (`email`, `firstname`, `lastname`, `password`, `verification_code`) VALUES (?, ?, ?, ?, ?);";
				$query = $conn->prepare($sql);
				$query->execute([
					$email,
					$firstname,
					$lastname,
					password_hash($plain_password, PASSWORD_BCRYPT),
					md5($verification_code),
				]);

				if ($query->rowCount() > 0) {
					$conn = null;

					return send_message("User is created successfully. Verification email sent.", "success", "login");
				} else {
					$conn = null;

					return send_message("Something went wrong. Try again.", "danger", "registration", [$email, $firstname, $lastname]);
				}
			} catch (PDOException $e) {
				$conn = null;

				return send_message($e->getMessage(), "danger", "registration", [$email, $firstname, $lastname]);
			}
		} else {
			$conn = null;

			return send_message("Please complete the required fields!", "danger", "login", [$email]);
		}
	}

	return header("Location: login.php");
?>
