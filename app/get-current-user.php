<?php
	session_start();

	require_once "../conn.php";
	require_once "../functions.php";

	$current_user = $_SESSION["current_user"];

  if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($current_user)) {
    echo json_encode($current_user);
  }
?>
