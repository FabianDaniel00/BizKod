<?php
	session_start();

    $from_admin = false;
    $active_page = "profile";

	require_once "../conn.php";

	$current_user = $_SESSION["current_user"];

	if (!isset($current_user)) {
		return header("Location: login.php");
	}
?>

<?php 
    if(isset($_GET["user_id"])){
        $data = $_GET["user_id"];
        $sql = "SELECT * FROM user WHERE id = ?";
        $query = $conn->prepare($sql);
        $query->execute([$data]);
        $user = $query->fetch();
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile • BizKod</title>
        <?php include "../components/head.php"; ?>
    </head>
    <body>
        <?php include "../components/navbar.php"; ?>

        <div class="px-3 bg-white">
            <h3 class="text-primary">Profile Details</h3>
            <hr style="border-top: 1px dotted #ccc;"/>

            <?php include "../components/alert.php"; ?>
        </div>

        <section class="profile d-flex justify-content-center">
            <div class="profile__container col-12 col-xl-8 d-flex justify-content-center align-items-center">
                <div class="profile__container-picture rounded-circle d-flex justify-content-center align-items-center"><?php echo $user["firstname"][0] . $user["lastname"][0];?></div>
                <div class="datas d-flex">
                    <h2 class="datas-name"><i class="fa-solid fa-user fa-sm"></i><?php echo $user["firstname"] . " " . $user["lastname"]; ?></h2>
                    <h2 class="datas-home"><i class="fa-solid fa-map-location-dot fa-sm"></i> <?php echo $user["origin"]; ?></h2>
                    <h2 class="datas-email"><i class="fa-solid fa-envelope fa-sm"></i> <?php echo $user["email"]; ?></h2>
                </div>
                <span class="profile__container-about">About me</span>
                <p class="profile__container-description"><?php echo $user["description"]; ?></p>
        </section>

        <?php include "../components/footer.php"; ?>
    </body>
</html>