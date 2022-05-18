<?php
	session_start();

	require_once "conn.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send_reset_password"])) {
    $email = $_POST["email"];

    if ($email != "") {
      $sql = "SELECT `is_verified` FROM `user` WHERE `email` = ?";
      $query = $conn->prepare($sql);
      $query->execute([$email]);
      $user = $query->fetch();

      if ($query->rowCount() > 0) {
        if ($user["is_verified"]) {
          try {
            $verification_code = bin2hex(random_bytes(32));

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `user` SET `verification_code` = ? WHERE `email` = ?";
            $query = $conn->prepare($sql);
            $query->execute([
              md5($verification_code),
              $email,
            ]);

            $message = '
              <html>
                <body>
                  <p>
                    <a href="http://localhost/BizKod/reset_password.php?verification_code='.$verification_code.'">Click here </a>
                    to reset your password.
                  </p>
                </body>
              </html>
            ';

            if ($query->rowCount() > 0 && mail($email, "BizKod Reset Password", $message)) {
              $_SESSION["alert"] = [
                "content" => "Reset password email sent.",
                "type" => "info",
              ];
              $conn = null;

              header("location: reset_password.php");
            } else {
              $_SESSION["alert"] = [
                "content" => "Something went wrong.",
                "type" => "danger",
              ];
              $conn = null;

              header("location: send_reset_password.php");
            }
          } catch(PDOException $e) {
            $_SESSION["alert"] = [
              "content" => $e->getMessage(),
              "type" => "danger",
            ];
            $conn = null;

            header("location: send_reset_password.php");
          }
        } else {
          $_SESSION["alert"] = [
            "content" => "You need to verify your email first.",
            "type" => "danger",
          ];
          $conn = null;

          header("location: send_reset_password.php");
        }
      } else {
        $_SESSION["alert"] = [
          "content" => "Reset password email sent.",
          "type" => "info",
        ];
        $conn = null;

        header("location: reset_password.php");
      }
    } else {
      $_SESSION["alert"] = [
				"content" => "Please fill up the required fields!",
				"type" => "danger",
			];
			$conn = null;

			header("location: send_reset_password.php");
    }
  }
?>
