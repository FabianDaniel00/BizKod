<?php
	session_start();

	require_once "../conn.php";
	require_once "../functions.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send-reset-password"])) {
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
            $sql = "UPDATE `user` SET `verification_code` = ? WHERE `email` = ?;";
            $query = $conn->prepare($sql);
            $query->execute([
              md5($verification_code),
              $email,
            ]);

            $message = '
              <html>
                <body>
                  <p>
                    <a href="http://localhost/BizKod/app/reset-password.php?verification_code='.$verification_code.'">Click here </a>
                    to reset your password.
                  </p>
                </body>
              </html>
            ';

            if ($query->rowCount() > 0 && mail($email, "BizKod Reset Password", $message)) {
              $conn = null;

              return send_message("Reset password email sent.", "success", "reset-password");
            } else {
              $conn = null;

              return send_message("Something went wrong.", "danger", "send-reset-password", [$email]);
            }
          } catch(PDOException $e) {
            $conn = null;

            return send_message($e->getMessage(), "danger", "send-reset-password", [$email]);
          }
        } else {
          $conn = null;

          return send_message("You need to verify your email first.", "danger", "send-reset-password", [$email]);
        }
      }

      $conn = null;

      return send_message("Reset password email sent.", "success", "reset-password");
    } else {
      $conn = null;

      return send_message("Please fill up the required fields!", "danger", "send-reset-password", [$email]);
    }
  }

  return header("location: send-reset-password.php");
?>
