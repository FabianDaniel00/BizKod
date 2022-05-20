<?php
  if (isset($_SESSION["alert"])):
    $alert = $_SESSION["alert"];
?>

  <div class="msg d-none">
    <div class="alert alert-<?php echo $alert["type"]; ?>">
      <?php echo $alert["content"]; ?>
      <button><i class="fa-solid fa-xmark"></i></button>
    </div>
  </div>

<?php
  endif;

  unset($_SESSION["alert"]);
?>
