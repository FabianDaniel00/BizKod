<?php
	session_start();
	session_destroy();

	return header("location: app/index.php");
?>
