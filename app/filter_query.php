<?php

session_start();
require_once('../conn.php');
$variables = $_POST['check'];

if(count($variables) == 1) 
{
    $sql = "SELECT * FROM `location` WHERE type=? ;";
			$query = $conn->prepare($sql);
			$query->execute([$variables[0]]);
            //var_dump($variables[0]);
            $valami = $query->fetch();
}
else
{
    echo'tobb van';
}

var_dump($variables);