<?php
    session_start();
    require_once "../conn.php";
    if(isset($_GET["locationid"]))
    {   
        $location = $_GET["locationid"];
        $sql = "SELECT * FROM location WHERE id=?";
        $query = $conn->prepare($sql);
        $query->execute([$location]);
        $asd = $query->fetch();
        
    }

?>