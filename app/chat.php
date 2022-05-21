<?php
	session_start();

	$from_admin = false;
    $active_page = "chat";

	require_once "../conn.php";

	$current_user = $_SESSION["current_user"];

	if (!isset($current_user)) {
		return header("Location: login.php");
	}
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
            <div class="chat__container col-xl-8">

                <div class="chat__container-row d-flex">
                    <div class="user rounded-circle d-flex justify-content-center align-items-center shadow-sm fw-bold">PK</div>
                    
                    <div class="right d-flex flex-column">
                        <span class="right-author">Krisztian</span>
                        <p class="right-message mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos similique officiis nihil, error ipsam a consequuntur ipsum officia facilis id ullam enim rerum necessitatibus quos quia dolorem optio maxime, labore, molestiae eius sit vero? Laboriosam voluptatibus eius aliquid dolore, assumenda corporis inventore libero dignissimos modi voluptate commodi, natus quia qui ea non aut tenetur quibusdam pariatur ut magnam tempore. Porro ad magni tempora esse dolorum unde eum, quis earum rem nulla deleniti eveniet recusandae dolor enim sint consectetur eos quasi voluptas. Facilis vitae exercitationem unde eligendi labore saepe nihil sed itaque beatae magnam sunt harum et officiis rerum, corporis nisi.</p>
                        <span class="right-time text-muted">16:59</span>
                    </div>
                </div>

                <div class="chat__container-row d-flex">
                    <div class="user rounded-circle d-flex justify-content-center align-items-center shadow-sm fw-bold">JC</div>
                    
                    <div class="right d-flex flex-column">
                        <span class="right-author">Jacint</span>
                        <p class="right-message mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. A assumenda porro adipisci quasi voluptas error rerum nihil, neque non asperiores.</p>
                        <span class="right-time text-muted">16:59</span>
                    </div>
                </div>

                <div class="chat__container-row d-flex current-user">
                    <div class="user rounded-circle d-flex justify-content-center align-items-center shadow-sm fw-bold">BV</div>
                    
                    <div class="right d-flex flex-column">
                        <span class="right-author">Boris</span>
                        <p class="right-message mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, nam?</p>
                        <span class="right-time text-muted">16:59</span>
                    </div>
                </div>

                <div class="chat__container-row d-flex current-user">
                    <div class="user rounded-circle d-flex justify-content-center align-items-center shadow-sm fw-bold">BV</div>
                    
                    <div class="right d-flex flex-column">
                        <span class="right-author">Boris</span>
                        <p class="right-message mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat eaque sint molestias vitae libero, repellendus harum quos! Excepturi iure eligendi accusamus, ducimus doloribus explicabo sapiente fugit consequatur ab sequi rerum asperiores quibusdam molestias impedit voluptatum mollitia delectus laborum vero similique. Iure quod qui aperiam temporibus consectetur eligendi itaque nisi excepturi dolorem aspernatur! Iusto deserunt perspiciatis nihil. Quos sapiente, aperiam eaque necessitatibus cumque explicabo corporis optio adipisci! Dicta nobis nisi animi nesciunt dolor minima excepturi quos corrupti suscipit esse! Accusamus quaerat sunt recusandae ex possimus a? Consequatur, deleniti magni accusantium voluptatibus amet optio rerum inventore repellat ut sit delectus minima dicta.</p>
                        <span class="right-time time-js text-muted">16:59</span>
                    </div>
                </div>
            </div>
        </section>

        <?php include "../components/footer.php"; ?>
    </body>
</html>
<?php
    $a = "2020-05-05";
?>
<script>
    var date = "<?php echo $a; ?>";
    const time = document.querySelector(".time-js");
    time.innerText = moment(date, "YYYY-MM-DD HH:mm").fromNow();
    console.log(date);
</script>