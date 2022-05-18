<?php
	$db_username = "root";
	$db_password = "";
	$db_name = "bizkod";

	$conn = new PDO("mysql:host=localhost;dbname=".$db_name, $db_username, $db_password );

	if (!$conn) {
		die("Fatal Error: Connection Failed!");
	}
?>
