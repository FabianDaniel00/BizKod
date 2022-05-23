<?php
	session_start();

	require_once "../conn.php";
	require_once "../functions.php";

  if (isset($_SESSION["current_user"]) && $_SESSION["current_user"]["is_admin"]) {
    // Insert user
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user-insert"])) {
      $email = $_POST["email"];
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $origin = $_POST["origin"];
      $description = $_POST["description"];
      $plain_password = $_POST["password"];
      $is_admin = isset($_POST["is_admin"]) ? 1 : 0;
      $is_verified = isset($_POST["is_verified"]) ? 1 : 0;

      if ($email != "" && $firstname != "" && $lastname != "" && $plain_password != "" && $is_admin != "" && $is_verified != "") {
        try {
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO `user` (`email`, `firstname`, `lastname`, `origin`, `description`, `password`, `is_admin`, `is_verified`) VALUES (?, ?, ?, ?, ?, ?);";
          $query = $conn->prepare($sql);
          $query->execute([
            $email,
            $firstname,
            $lastname,
            $origin ?: NULL,
            $description ?: NULL,
					  password_hash($plain_password, PASSWORD_BCRYPT),
            $is_admin,
            $is_verified,
          ]);

          if ($query->rowCount() > 0) {
            $conn = null;

            return send_message("User successfully added.", "success", "user-admin");
          } else {
            $conn = null;

            return send_message("Something went wrong. Try again.", "danger", "user-admin", [$email, $firstname, $lastname, $origin, $description, $is_admin, $is_verified]);
          }
        } catch(PDOException $e) {
          $conn = null;

          return send_message($e->getMessage(), "danger", "user-admin", [$email, $firstname, $lastname, $origin, $description, $is_admin, $is_verified]);
        }
      } else {
        $conn = null;

        return send_message("Missing data.", "danger", "user-admin", [$email, $firstname, $lastname, $origin, $description, $is_admin, $is_verified]);
      }
    }

    // Update user
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user-update"])) {
      $id = $_POST["id"];
      $email = $_POST["email"];
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $origin = $_POST["origin"];
      $description = $_POST["description"];
      $is_admin = isset($_POST["is_admin"]) ? 1 : 0;
      $is_verified = isset($_POST["is_verified"]) ? 1 : 0;

      if ($id != "" && $email != "" && $firstname != "" && $lastname != "" && $is_admin != "" && $is_verified != "") {
        try {
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "UPDATE `user` SET `email` = ?, `firstname` = ?, `lastname` = ?, `origin`, `description`, `is_admin` = ?, `is_verified` = ? WHERE `id` = ?;";
          $query = $conn->prepare($sql);
          $query->execute([
            $email,
            $firstname,
            $lastname,
            $origin ?: NULL,
            $description ?: NULL,
            $is_admin,
            $is_verified,
            $id,
          ]);

          if ($query->rowCount() > 0) {
            $conn = null;

            return send_message("User successfully updated.", "success", "user-admin");
          } else {
            $conn = null;

            return send_message("Nothing changed.", "info", "user-admin");
          }
        } catch(PDOException $e) {
          $conn = null;

          return send_message($e->getMessage, "danger", "user-admin");
        }
      } else {
        $conn = null;

        return send_message("Missing data.", "danger", "user-admin");
      }
    }

    // Delete user
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user-delete"])) {
      $id = $_POST["id"];

      if ($id != "") {
        try {
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "DELETE FROM `user` WHERE `id` = ?";
          $query = $conn->prepare($sql);
          $query->execute([
            $id,
          ]);

          if ($query->rowCount() > 0) {
            $conn = null;

            return send_message("User successfully deleted.", "success", "user-admin");
          } else {
            $conn = null;

            return send_message("Something went wrong. Try again.", "danger", "user-admin");
          }
        } catch(PDOException $e) {
          $conn = null;

          return send_message($e->getMessage(), "danger", "user-admin");
        }
      } else {
        $conn = null;

        return send_message("Missing data.", "danger", "user-admin");
      }
    }
  }

  return header("Location: ../app/login.php");
?>
