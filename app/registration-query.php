<?php
	session_start();

	require_once "../conn.php";
	require_once "../functions.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
		$email = $_POST["email"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$plain_password = $_POST["password"];
		$confirm_password = $_POST["confirm_password"];

		if ($email != "" && $firstname != "" && $lastname != "" && $plain_password != "" && $confirm_password != "") {
			if (strlen($plain_password) < 6) {
				$conn = null;

				return send_message("Password must be at least 6 characters.", "danger", "registration", [$email, $firstname, $lastname]);
			}

			if ($plain_password != $confirm_password) {
				$conn = null;

				return send_message("Passwords must match.", "danger", "registration", [$email, $firstname, $lastname]);
			}

			$sql = "SELECT `id` FROM `user` WHERE `email` = ?;";
			$query = $conn->prepare($sql);
			$query->execute([$email]);

			if ($query->rowCount() > 0) {
				$conn = null;

				return send_message("There is already user with this email.", "danger", "registration", [$email, $firstname, $lastname]);
			}

			try {
				$verification_code = bin2hex(random_bytes(32));

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

				$body = '
					<html>
						<body>
							<p>
								<a href="http://localhost/BizKod/app/verify-email-query.php?verification_code='.$verification_code.'">Click here </a>
								to verify your email.
							</p>
						</body>
					</html>
				';

				if ($query->rowCount() > 0 && send_mail($email, $firstname." ".$lastname, $body, "BizKod Email Verification")) {
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

			return send_message("Please fill up the required fields!", "danger", "registration", [$email, $firstname, $lastname]);
		}
	}

	return header("Location: registration.php");
?>
