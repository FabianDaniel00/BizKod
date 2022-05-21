<nav class="navbar navbar-expand-xl navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../app/home.php">
      <img class="navbar-brand_logo" alt="logo" src="../images/bizkod_logo.png" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between flex-column align-items-start align-items-xl-center flex-xl-row" id="navbar">
      <ul class="navbar-nav mb-2 mb-xl-0 order-last order-xl-first">
        <li class="nav-item">
          <a class="p-2 nav-link<?php echo $active_page == "home" ? " active" : ""; ?>" href="<?php echo $from_admin ? "../app/" : ""; ?>home.php"><i class="fa-solid fa-house fa-sm"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="p-2 nav-link<?php echo $active_page == "chat" ? " active" : ""; ?>" href="<?php echo $from_admin ? "../app/" : ""; ?>chat.php"><i class="fa-solid fa-comment-dots fa-sm"></i> Chat with others</a>
        </li>
        <?php
          if ($current_user["is_admin"]):
        ?>
          <li class="nav-item dropdown">
            <a class="p-2 nav-link dropdown-toggle<?php echo str_contains($active_page, "admin") ? " active" : ""; ?>" aria-current="admin" href="#" id="navbarAdminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-lock fa-sm"></i> Admin
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarAdminDropdown">
              <li><a class="dropdown-item<?php echo $active_page == "user-admin" ? " active" : ""; ?>" href="<?php echo $from_admin ? "" : "../admin/"; ?>user-admin.php"><i class="fa-solid fa-users fa-sm"></i> Users</a></li>
              <!-- <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-muted" href="#">Something else here</a></li> -->
            </ul>
          </li>
        <?php
          endif;
        ?>
        <li class="nav-item">
          <a class="p-2 nav-link d-xl-none" href="../logout.php"><i class="fa-solid fa-right-from-bracket fa-sm"></i> Logout</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>

      <div class="d-flex align-items-center order-first order-xl-last user">
        <?php if ($_SESSION["current_user"]): ?>
          <a class="user__badge rounded-circle d-flex justify-content-center align-items-center shadow-sm fw-bold" href="<?php echo $from_admin ? "" : "../app/"; ?>profile.php">
            <?php echo strtoupper(substr($current_user["firstname"], 0, 1).substr($current_user["lastname"], 0, 1)); ?>
          </a>

          <a class="user__name" href="<?php echo $from_admin ? "" : "../app/"; ?>profile.php">
            <?php echo $current_user["firstname"]." ".$current_user["lastname"].($current_user["is_admin"] ? " (Admin)" : ""); ?>
          </a>
        <?php endif; ?>

        <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success d-flex align-items-center" type="submit">
            <i class="fa-solid fa-magnifying-glass me-1"></i>
            Search
          </button>
        </form> -->

        <a class="nav-link p-2 d-none d-xl-block user__logout" href="../logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>
