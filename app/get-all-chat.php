<?php
	session_start();

	require_once "../conn.php";
	require_once "../functions.php";

	$current_user = $_SESSION["current_user"];

  if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($current_user)) {

    $sql = "SELECT user.firstname AS 'firstname', user.lastname AS 'lastname', chat.message AS 'message', chat.userID AS 'userID', chat.created_at AS 'created_at' FROM `chat` INNER JOIN `user` ON chat.userID = user.id;";
    $query = $conn->prepare($sql);
    $query->execute();
    $all_chat = [];

    if ($query->rowCount() > 0) {
      while($chat = $query->fetch(PDO::FETCH_ASSOC)) {
        $all_chat[] = $chat;
      }
      echo json_encode($all_chat);
    }
  }
?>
