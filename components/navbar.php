<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../app/home.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between flex-column align-items-start align-items-md-center flex-md-row" id="navbar">
      <ul class="navbar-nav mb-2 mb-md-0 order-last order-md-first">
        <li class="nav-item">
          <a class="nav-link<?php echo $active_page == "home" ? " active" : ""; ?>" href="<?php echo $from_admin ? "../app/" : ""; ?>home.php">Home</a>
        </li>
        <?php
          if ($current_user["is_admin"]):
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle<?php echo str_contains($active_page, "admin") ? " active" : ""; ?>" aria-current="admin" href="#" id="navbarAdminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarAdminDropdown">
              <li><a class="dropdown-item<?php echo $active_page == "user-admin" ? " active" : ""; ?>" href="<?php echo $from_admin ? "" : "../admin/"; ?>user-admin.php">User Admin</a></li>
              <!-- <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-muted" href="#">Something else here</a></li> -->
            </ul>
          </li>
        <?php
          endif;
        ?>
        <li class="nav-item">
          <a class="nav-link d-md-none" href="../logout.php">Logout</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>

      <div class="d-flex align-items-center gap-3 order-first order-md-last">
        <?php if ($_SESSION["current_user"]): ?>
          <span class="user-badge rounded-circle d-flex justify-content-center align-items-center shadow-sm fw-bold">
            <?php echo strtoupper(substr($current_user["firstname"], 0, 1).substr($current_user["lastname"], 0, 1)); ?>
          </span>

          <span>
            <?php echo $current_user["firstname"]." ".$current_user["lastname"].($current_user["is_admin"] ? " (Admin)" : ""); ?>
          </span>
        <?php endif; ?>

        <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success d-flex align-items-center" type="submit">
            <i class="fa-solid fa-magnifying-glass me-1"></i>
            Search
          </button>
        </form> -->

        <a class="nav-link p-0 d-none d-md-block" href="../logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>
