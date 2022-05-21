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
                <div class="profile__container-picture rounded-circle d-flex justify-content-center align-items-center">JJ</div>
                <div class="datas d-flex">
                    <h2 class="datas-name"><i class="fa-solid fa-user fa-sm"></i> Juhasz Csicska Jacint</h2>
                    <h2 class="datas-home"><i class="fa-solid fa-map-location-dot fa-sm"></i> Faszomfalva</h2>
                    <h2 class="datas-email"><i class="fa-solid fa-envelope fa-sm"></i> szopas@gmail.com</h2>
                </div>
                <span class="profile__container-about">About me</span>
                <p class="profile__container-description">Juhasz Csicska Jacint vok. Faszomfalvan szulettem de Csantaveren nevelkedtem. Van egy 7 centis pusztitom es meg nem is szegyellem. Neha sokaig kell keresni de nem baj az, kis bohoccal is lehet nagy cirkuszt csinalni. Ha szereted az ultrat es no is vagy akkor veszem a gyurut es elveszlek felesegul!!!44!!$$$!!44</p>
            </div>
        </section>

        <?php include "../components/footer.php"; ?>
    </body>
</html>