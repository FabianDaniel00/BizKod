<?php
	session_start();

	require_once "../conn.php";
	require_once "../functions.php";

  if (isset($_SESSION["current_user"]) && $_SESSION["current_user"]["is_admin"]) {
    // Insert location
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["location-insert"])) {
      $name = $_POST["name"];
      $lat = $_POST["lat"];
      $lon = $_POST["lon"];
      $description = $_POST["description"];
      $type = $_POST["type"];
      $map_url = $_POST["map_url"];
      $picture = $_FILES["picture"];

      if ($name != "" && $lat != "" && $lon != "" && $description != "" && $type != "" && $picture["size"] != 0 && $map_url != "") {
        try {
          $target_dir = "../images/map/";
          $target_file = $target_dir.basename($picture["name"]);
          if(!move_uploaded_file($picture["tmp_name"], $target_file)) {
            $conn = null;

            return send_message("Something went wrong. Try again.", "danger", "locations-admin", [$name, $lat, $lon, $description, $type, $map_url]);
          }

          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO `location` (`name`, `lat`, `lon`, `description`, `type`, `picture`, `map`) VALUES (?, ?, ?, ?, ?, ?, ?);";
          $query = $conn->prepare($sql);
          $query->execute([
            $name,
            $lat,
            $lon,
					  $description,
            $type,
            $picture["name"],
            $map_url,
          ]);

          if ($query->rowCount() > 0) {
            $conn = null;

            return send_message("Location successfully added.", "success", "locations-admin");
          } else {
            $conn = null;

            return send_message("Something went wrong. Try again.", "danger", "locations-admin", [$name, $lat, $lon, $description, $type, $map_url]);
          }
        } catch(PDOException $e) {
          $conn = null;

          return send_message($e->getMessage(), "danger", "locations-admin", [$name, $lat, $lon, $description, $type, $map_url]);
        }
      } else {
        $conn = null;

        return send_message("Missing data.", "danger", "locations-admin", [$name, $lat, $lon, $description, $type, $map_url]);
      }
    }

    // Update location
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["location-update"])) {
      $id = $_POST["id"];
      $name = $_POST["name"];
      $lat = $_POST["lat"];
      $lon = $_POST["lon"];
      $description = $_POST["description"];
      $type = $_POST["type"];
      $picture = $_FILES["picture"];
      $map_url = $_POST["map_url"];

      if ($id != "" && $name != "" && $lat != "" && $lon != "" && $description != "" && $type != "" && $type != "-1" && $map_url != "") {
        try {
          $query = "";
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          if ($picture["size"] != 0) {
            $target_dir = "../images/map/";
            $target_file = $target_dir.basename($picture["name"]);
            if(!move_uploaded_file($picture["tmp_name"], $target_file)) {
              $conn = null;

              return send_message("Something went wrong. Try again.", "danger", "locations-admin");
            }

            $sql = "UPDATE `location` SET `name` = ?, `lat` = ?, `lon` = ?, `description` = ?, `type` = ?, `picture` = ?, `map_url` = ? WHERE `id` = ?;";
            $query = $conn->prepare($sql);
            $query->execute([
              $name,
              $lat,
              $lon,
              $description,
              $type,
              $picture["name"],
              $map_url,
              $id,
            ]);
          } else {
            $sql = "UPDATE `location` SET `name` = ?, `lat` = ?, `lon` = ?, `description` = ?, `type` = ?, `map` = ? WHERE `id` = ?;";
            $query = $conn->prepare($sql);
            $query->execute([
              $name,
              $lat,
              $lon,
              $description,
              $type,
              $map_url,
              $id,
            ]);
          }

          if ($query->rowCount() > 0) {
            $conn = null;

            return send_message("Location successfully updated.", "success", "locations-admin");
          } else {
            $conn = null;

            return send_message("Nothing changed.", "info", "locations-admin");
          }
        } catch(PDOException $e) {
          $conn = null;

          return send_message($e->getMessage(), "danger", "locations-admin");
        }
      } else {
        $conn = null;

        return send_message("Missing data.", "danger", "locations-admin");
      }
    }

    // Delete location
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["location-delete"])) {
      $id = $_POST["id"];

      if ($id != "") {
        try {
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "DELETE FROM `location` WHERE `id` = ?";
          $query = $conn->prepare($sql);
          $query->execute([
            $id,
          ]);

          if ($query->rowCount() > 0) {
            $conn = null;

            return send_message("Location successfully deleted.", "success", "locations-admin");
          } else {
            $conn = null;

            return send_message("Something went wrong. Try again.", "danger", "locations-admin");
          }
        } catch(PDOException $e) {
          $conn = null;

          return send_message($e->getMessage(), "danger", "locations-admin");
        }
      } else {
        $conn = null;

        return send_message("Missing data.", "danger", "locations-admin");
      }
    }
  }

  return header("Location: ../app/login.php");
?>
