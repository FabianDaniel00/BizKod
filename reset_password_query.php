<?php
	session_start();

	require_once "conn.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reset_password"])) {
    $plain_password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $verification_code = $_POST["verification_code"];

    if ($plain_password != "" && $confirm_password != "" && $verification_code != "") {
      if ($plain_password != $confirm_password) {
				$_SESSION["alert"] = [
					"content" => "Passwords must match.",
					"type" => "danger",
				];
				$conn = null;

				header("location: reset_password.php");
			}

      try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `user` SET `verification_code` = NULL, `password` = ? WHERE `verification_code` = ?";
        $query = $conn->prepare($sql);
        $query->execute([
          password_hash($plain_password, PASSWORD_BCRYPT),
          md5($verification_code),
        ]);

        if ($query->rowCount() > 0) {
          $_SESSION["alert"] = [
            "content" => "Password reseted successfully.",
            "type" => "info",
          ];
          $conn = null;

          header("location: index.php");
        } else {
          $_SESSION["alert"] = [
            "content" => "Something went wrong. Try again and click the link in the email.",
            "type" => "danger",
          ];
          $conn = null;

          header("location: reset_password.php");
        }
      } catch(PDOException $e) {
        $_SESSION["alert"] = [
          "content" => $e->getMessage(),
          "type" => "danger",
        ];
        $conn = null;

        header("location: reset_password.php");
      }
    } else {
      $_SESSION["alert"] = [
				"content" => "Missing data!",
				"type" => "danger",
			];
			$conn = null;

			header("location: reset_password.php");
    }
  }
?>
