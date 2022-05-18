<?php
	session_start();

	require_once "conn.php";

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $verification_code = $_GET["verification_code"];

    if (isset($verification_code)) {
      try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `user` SET `is_verified` = 1, `verification_code` = NULL WHERE `verification_code` = ?";
        $query = $conn->prepare($sql);
        $query->execute([md5($verification_code)]);

        if ($query->rowCount() > 0) {
          $_SESSION["alert"] = [
            "content" => "Your email was successfully verified. You can login now.",
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

          header("location: index.php");
        }
      } catch(PDOException $e) {
        $_SESSION["alert"] = [
          "content" => $e->getMessage(),
          "type" => "danger",
        ];
        $conn = null;

        header("location: index.php");
      }
    } else {
      $_SESSION["alert"] = [
        "content" => "Can't find the verification code.",
        "type" => "danger",
      ];
      $conn = null;

      header("location: index.php");
    }
  }
?>
