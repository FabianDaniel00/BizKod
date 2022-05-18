<?php
	session_start();

	require_once "conn.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
		$email = $_POST["email"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$plain_password = $_POST["password"];
		$confirm_password = $_POST["confirm_password"];

		if ($email != "" && $firstname != "" && $lastname != "" && $plain_password != "" && $confirm_password != "") {
			if (strlen($plain_password) < 6) {
				$_SESSION["alert"] = [
					"content" => "Password must be at least 6 characters.",
					"type" => "danger",
				];
				$_SESSION["inputs"]["email"] = $email;
				$_SESSION["inputs"]["firstname"] = $firstname;
				$_SESSION["inputs"]["lastname"] = $lastname;
				$conn = null;

				return header("location: registration.php");
			}

			if ($plain_password != $confirm_password) {
				$_SESSION["alert"] = [
					"content" => "Passwords must match.",
					"type" => "danger",
				];
				$_SESSION["inputs"]["email"] = $email;
				$_SESSION["inputs"]["firstname"] = $firstname;
				$_SESSION["inputs"]["lastname"] = $lastname;
				$conn = null;

				return header("location: registration.php");
			}

			$sql = "SELECT `id` FROM `user` WHERE `email` = ?";
			$query = $conn->prepare($sql);
			$query->execute([$email]);

			if ($query->rowCount() > 0) {
				$_SESSION["alert"] = [
					"content" => "There is already user with this email.",
					"type" => "danger",
				];
				$_SESSION["inputs"]["email"] = $email;
				$_SESSION["inputs"]["firstname"] = $firstname;
				$_SESSION["inputs"]["lastname"] = $lastname;
				$conn = null;

				return header("location: registration.php");
			}

			try {
				$verification_code = bin2hex(random_bytes(32));

				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `user` (`email`, `firstname`, `lastname`, `password`, `verification_code`) VALUES (?, ?, ?, ?, ?)";
				$query = $conn->prepare($sql);
				$query->execute([
					$email,
					$firstname,
					$lastname,
					password_hash($plain_password, PASSWORD_BCRYPT),
					md5($verification_code),
				]);

				$message = '
					<html>
						<body>
							<p>
								<a href="http://localhost/BizKod/verify_email_query.php?verification_code='.$verification_code.'">Click here </a>
								to verify your email.
							</p>
						</body>
					</html>
				';

				if ($query->rowCount() > 0 && mail($email, "BizKod Email Verification", $message)) {
					$_SESSION["alert"] = [
						"content" => "User is created successfully. Verification email sent.",
						"type" => "info",
					];
					$conn = null;

					return header("location: index.php");
				} else {
					$_SESSION["alert"] = [
						"content" => "Something went wrong.",
						"type" => "danger",
					];
					$_SESSION["inputs"]["email"] = $email;
					$_SESSION["inputs"]["firstname"] = $firstname;
					$_SESSION["inputs"]["lastname"] = $lastname;
					$conn = null;

					return header("location: registration.php");
				}
			} catch (PDOException $e) {
				$_SESSION["alert"] = [
					"content" => $e->getMessage(),
					"type" => "danger",
				];
				$_SESSION["inputs"]["email"] = $email;
				$_SESSION["inputs"]["firstname"] = $firstname;
				$_SESSION["inputs"]["lastname"] = $lastname;
				$conn = null;

				return header("location: registration.php");
			}
		} else {
			$_SESSION["alert"] = [
				"content" => "Please fill up the required fields!",
				"type" => "danger",
			];
			$conn = null;

			return header("location: registration.php");
		}
	}
?>
