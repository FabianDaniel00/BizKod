<?php
	session_start();

	require_once "../conn.php";
	require_once "../functions.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reset-password"])) {
    $plain_password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $verification_code = $_POST["verification_code"];

    if ($plain_password != "" && $confirm_password != "" && $verification_code != "") {
      if ($plain_password != $confirm_password) {
        $conn = null;

        return send_message("Passwords must match.", "danger", "reset-password");
			}

      try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `user` SET `verification_code` = NULL, `password` = ? WHERE `verification_code` = ?;";
        $query = $conn->prepare($sql);
        $query->execute([
          password_hash($plain_password, PASSWORD_BCRYPT),
          md5($verification_code),
        ]);

        if ($query->rowCount() > 0) {
          $conn = null;

          return send_message("Password reseted successfully.", "success", "index");
        } else {
          $conn = null;

          return send_message("Something went wrong. Try again and click the link in the email.", "danger", "reset-password");
        }
      } catch(PDOException $e) {
        $conn = null;

        return send_message($e->getMessage(), "danger", "reset-password");
      }
    } else {
      $conn = null;

      return send_message("Missing data!", "danger", "reset-password");
    }
  }

	return header("location: reset-password.php");
?>
