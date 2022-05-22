
<?php 
    session_start();
    require_once "../conn.php";
    //return var_dump($_POST["message"]);
    if(isset($_POST["message"]))
    {
        $sql = "INSERT INTO `chat` (`created_at`, `message`, `userID`) VALUES (?, ?, ?);";
        $query = $conn->prepare($sql);
        $query->execute([date_create()->format('Y-m-d H:i:s'), $_POST['message'], $_SESSION["current_user"]['id']]);
        if ($query->rowCount() > 0){
            header("Location: chat.php#chatform");
        }
        else{
            return "Message not sent!";
        }
    }

?>