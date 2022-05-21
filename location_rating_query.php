<?php
    session_start();
    require_once "../conn.php";
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"]){
        $current_user = $_SESSION["current_user"];
        $loc = $_POST["location_id"];
        $mes = $_POST["message"];
        $rat = $_POST["rating"];
    
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql "INSERT INTO location_rating (created_at, location_id, message, rating, user_id) VALUES (?, ?, ?, ?, ?);";
            $query = $conn-> prepare($sql);
            $query -> execute([
                DateTime('NOW'),
                $loc,
                $mes,
                $rat,
                $current_user["id"]
            ]);

            if($query->rowCount() > 0){
                //sikeres ratingeles
                //return "previous page"
            }
        
        } catch (PDOException $e) {
            $conn = null;
    
            return send_message($e->getMessage(), "Something went wrong", "rating", [$email, $firstname, $lastname]);
        }

        
    }
?>