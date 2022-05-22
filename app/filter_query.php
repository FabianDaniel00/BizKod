<?php

session_start();
require_once('../conn.php');
$variables = $_POST['check'];

if(count($variables) == 1) 
{
    $sql = "SELECT id FROM `location` WHERE type=? ;";
    $query = $conn->prepare($sql);
    $query->execute([$variables[0]]);
    //var_dump($variables[0]);
    $valami = $query->fetch();
    header('location:home.php?type=' . $valami);
}
else
{
    $sql = "SELECT id FROM `location` WHERE type=? ;";
    $query = $conn->prepare($sql);
    $query->execute([$variables[0]]);
    //var_dump($variables[0]);
    $valami = $query->fetch();
    header('location:home.php?type=' . $valami);
}

var_dump($variables);