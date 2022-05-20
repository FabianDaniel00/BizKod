<?php
	session_start();

	require_once "../conn.php";
	require_once "../functions.php";

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $verification_code = $_GET["verification_code"];

    if (isset($verification_code)) {
      try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `user` SET `is_verified` = 1, `verification_code` = NULL WHERE `verification_code` = ?";
        $query = $conn->prepare($sql);
        $query->execute([md5($verification_code)]);

        if ($query->rowCount() > 0) {
          $conn = null;

          return send_message("Your email was successfully verified. You can login now.", "success", "index");
        } else {
          $conn = null;

          return send_message("Something went wrong. Try again and click the link in the email.", "danger", "index");
        }
      } catch(PDOException $e) {
        $conn = null;

        return send_message($e->getMessage(), "danger", "index");
      }
    } else {
      $conn = null;

      return send_message("Can't find the verification code.", "danger", "index");
    }
  }

  return header("location: index.php");
?>
