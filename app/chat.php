<?php
	session_start();

	$from_admin = false;
    $active_page = "chat";

	require_once "../conn.php";
    //
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	$current_user = $_SESSION["current_user"];

	if (!isset($current_user)) {
		return header("Location: login.php");
	}

    // function time_ago_en($time)
    // {
    //     if(!is_numeric($time))
    //         $time = strtotime($time);

    //     $periods = array("second", "minute", "hour", "day", "week", "month", "year", "age");
    //     $lengths = array("60","60","24","7","4.35","12","100");

    //     $now = time();

    //     $difference = $now - $time;
    //     if ($difference <= 10 && $difference >= 0)
    //         return $tense = 'just now';
    //     elseif($difference > 0)
    //         $tense = 'ago';
    //     elseif($difference < 0)
    //         $tense = 'later';

    //     for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
    //         $difference /= $lengths[$j];
    //     }

    //     $difference = round($difference);

    //     $period =  $periods[$j] . ($difference >1 ? 's' :'');
    //     return "{$difference} {$period} {$tense} ";
    // }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chat • BizKod</title>
        <?php include "../components/head.php"; ?>
    </head>
    <body>
        <?php include "../components/navbar.php"; ?>

        <div class="px-3 bg-white">
            <h3 class="text-primary">Chat with Others</h3>
            <hr style="border-top: 1px dotted #ccc;"/>

            <?php include "../components/alert.php"; ?>
        </div>

        <section class="chat d-flex justify-content-center">
            <div class="chat__container col-12 col-xl-8">
                <?php
                    $sql = "SELECT user.firstname, user.lastname, user.id AS 'user_id', chat.message, chat.created_at FROM chat INNER JOIN user ON chat.userID = user.id;";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    while($chat = $query->fetch()):
                ?>
                <div class="chat__container-row d-flex<?php echo $current_user["id"] == $chat["user_id"] ? " current-user" : "" ; ?>">
                    <div class="user rounded-circle d-flex justify-content-center align-items-center shadow-sm fw-bold"><?php 
                        echo strtoupper($chat["firstname"][0]) . strtoupper($chat["lastname"][0]);
                    ?></div>
                    
                    <div class="right d-flex flex-column">
                        <span class="right-author"><?php echo $chat["firstname"]." " . $chat["lastname"];?></span>
                        <p class="right-message mb-0"><?php echo $chat["message"]; ?></p>
                        <span class="right-time time-js text-muted">16:15
                        </span>
                    </div>
                </div>
                <?php endwhile; ?>

                <div class="chat__container--submit">
                    <form action="chat-query.php" method="POST" class="form">
                        <input type="text" class="form_input" placeholder="Type here the message..." />
                        <button class="form_btn"><i class="fa-solid fa-phone-arrow-up-right"></i> SEND</button>
                    </form>
                </div>
            </div>
        </section>

        <?php include "../components/footer.php"; ?>
    </body>
</html>

<script type="text/javascript">
    function dateCalculator (time) {
        if (isNaN(time))
        let currentTime = strtotime(time);

        let periods = array("second", "minute", "hour", "day", "week", "month", "year", "age");
        let lengths = array("60","60","24","7","4.35","12","100");

        let now = Date.now();

        var difference = now - time;
        if (difference <= 10 && difference >= 0)
            {return tense = 'just now';}
        else if(difference > 0)
            {return tense = 'ago';}
        else if(difference < 0)
            {return tense = 'later';}

        for(let j = 0; difference >= lengths[j] && j < count(lengths)-1; j++) {
            difference /= lengths[j];
        }

        difference = round(difference);

        period = periods[$j] . (difference >1 ? 's' :'');
        return `${difference} + ${period} + ${tense}`;
    }
</script>