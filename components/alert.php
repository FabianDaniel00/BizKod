<?php
  if (isset($_SESSION["alert"])):
    $alert = $_SESSION["alert"];
?>

  <div class="msg d-none">
    <div class="alert alert-<?php echo $alert["type"]; ?> pe-5 position-sticky top-1 shadow-sm">
      <?php echo $alert["content"]; ?>
      <button class="position-absolute top-50 translate-middle text-<?php echo $alert["type"]; ?>">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>
  </div>

<?php
  endif;

  unset($_SESSION["alert"]);
?>
