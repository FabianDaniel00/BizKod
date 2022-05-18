<?php
	session_start();

	require_once "conn.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["login"])) {
		$email = $_POST["email"];
		$plain_password = $_POST["password"];

		if ($email != "" && $plain_password != "") {
			$sql = "SELECT * FROM `user` WHERE `email` = ?";
			$query = $conn->prepare($sql);
			$query->execute([$email]);

			$user = $query->fetch();

			if ($query->rowCount() > 0 && password_verify($plain_password, $user["password"])) {
				if (!$user["is_verified"]) {
					$_SESSION["alert"] = [
						"content" => "You need to verify your email to login.",
						"type" => "danger",
					];
					$_SESSION["inputs"]["email"] = $email;
					$conn = null;

					return header("location: index.php");
				}

				$_SESSION["user"] = $user;

				return header("location: home.php");
			} else {
				$_SESSION["alert"] = [
					"content" => "Invalid email or password.",
					"type" => "danger",
				];
				$_SESSION["inputs"]["email"] = $email;
				$conn = null;

				return header("location: index.php");
			}
		} else {
			$_SESSION["alert"] = [
				"content" => "Please complete the required fields!",
				"type" => "danger",
			];
			$conn = null;

			return header("location: index.php");
		}
	}
?>
