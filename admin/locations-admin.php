<?php
	session_start();

  $from_admin = true;
  $active_page = "location-admin";

	require_once "../conn.php";

	$current_user = $_SESSION["current_user"];

	if (!isset($current_user) || isset($current_user) && !$current_user["is_admin"]) {
		return header("Location: ../app/login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Locations Admin • BizKod</title>
  <?php include "../components/head.php"; ?>
</head>
<body>
  <?php include "../components/navbar.php"; ?>

	<div class="px-3">
		<h3 class="text-primary">Locations Admin</h3>
		<hr style="border-top: 1px dotted #ccc;"/>

		<?php
      include "../components/alert.php";

      $has_inputs = isset($_SESSION["inputs"]);
      $inputs = $has_inputs ? $_SESSION["inputs"] : null;
    ?>

    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userInsertModal">
        <i class="fa-solid fa-plus me-1"></i>
        Add new location
      </button>

      <div class="modal fade" id="userInsertModal" tabindex="-1" aria-labelledby="userInsertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="userInsertModalLabel">Add new location</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form id="userInsertForm" action="location-admin-query.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                  <input type="name" class="form-control" name="name" id="name" value="<?php echo $has_inputs ? $inputs["name"] : ""; ?>" required>
                </div>

                <div class="mb-3">
                  <label for="lat" class="form-label">Lat <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="lat" id="lat" value="<?php echo $has_inputs ? $inputs["lat"] : ""; ?>" required>
                </div>

                <div class="mb-3">
                  <label for="lon" class="form-label">Lng <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="lon" id="lon" value="<?php echo $has_inputs ? $inputs["lon"] : ""; ?>" required>
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="description" form="userInsertForm" name="description" rows="3" placeholder="Description..." required><?php echo $has_inputs ? $inputs["description"] : ""; ?></textarea>
                </div>

                <div class="mb-3">
                  <label for="map_url" class="form-label">Map url <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="map_url" form="userInsertForm" name="map_url" rows="3" placeholder="Map url..."><?php echo $has_inputs ? $inputs["map_url"] : ""; ?></textarea>
                </div>

                <div class="mb-3">
                  <label for="formFile" class="form-label">Picture <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="formFile" name="picture">
                </div>

                <div class="mb-3">
                  <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                  <select class="form-select" name="type" id="type">
                    <option value="-1" selected>Select one type</option>
                    <option value="church"<?php if($has_inputs) echo $inputs["type"] == "church" ? " selected" : ""; ?>>Church</option>
                    <option value="culture"<?php if($has_inputs) echo $inputs["type"] == "culture" ? " selected" : ""; ?>>Culture</option>
                    <option value="park"<?php if($has_inputs) echo $inputs["type"] == "park" ? " selected" : ""; ?>>Park</option>
                    <option value="hotel"<?php if($has_inputs) echo $inputs["type"] == "hotel" ? " selected" : ""; ?>>Hotel</option>
                    <option value="sport"<?php if($has_inputs) echo $inputs["type"] == "sport" ? " selected" : ""; ?>>Sport</option>
                    <option value="food"<?php if($has_inputs) echo $inputs["type"] == "food" ? " selected" : ""; ?>>Food</option>
                    <option value="shop"<?php if($has_inputs) echo $inputs["type"] == "shop" ? " selected" : ""; ?>>Shop</option>
                    <option value="transport"<?php if($has_inputs) echo $inputs["type"] == "transport" ? " selected" : ""; ?>>Transport</option>
                    <option value="official"<?php if($has_inputs) echo $inputs["type"] == "official" ? " selected" : ""; ?>>Official</option>
                  </select>
                </div>

                <input type="hidden" name="location-insert" />
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                <i class="fa-solid fa-xmark me-1"></i>
                Cancel
              </button>
              <button type="submit" form="userInsertForm" class="btn btn-success">
                <i class="fa-solid fa-plus me-1"></i>
                Add location
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Lat</th>
                <th>Lon</th>
                <th>Picture</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
          <?php
            unset($_SESSION["inputs"]);

            $sql = "SELECT `id`, `name`, `lat`, `lon`, `picture`, `description`, `type`, `map` FROM `location`;";
            $query = $conn->prepare($sql);
            $query->execute();

            while ($location = $query->fetch()):
          ?>
            <tr>
              <td><?php echo $location["id"]; ?></td>
              <td><a href="<?php echo "../app/location.php?location-id=".$location["id"]; ?>"><?php echo $location["name"]; ?></a></td>
              <td><?php echo $location["lat"]; ?></td>
              <td><?php echo $location["lon"]; ?></td>
              <td>
                <img src="../images/map/<?php echo $location["picture"]; ?>" alt="<?php echo $location["name"]; ?>" width="100px" class="rounded-3 shadow-sm" />
              </td>
              <td class="text-center">
                <button type="button" class="btn btn-warning me-0 me-md-3 mb-3 mb-md-0" data-bs-toggle="modal" data-bs-target="#userEditModal<?php echo $location["id"]; ?>">
                  <i class="fa-solid fa-pen-to-square me-1"></i>
                  Edit
                </button>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#userDeleteModal<?php echo $location["id"]; ?>">
                  <i class="fa-solid fa-trash-can me-1"></i>
                  Delete
                </button>

                <div class="modal fade text-start" id="userEditModal<?php echo $location["id"]; ?>" tabindex="-1" aria-labelledby="userEditModal<?php echo $location["id"]; ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h5 class="modal-title" id="userEditModal<?php echo $location["id"]; ?>Label">Edit Location #<?php echo $location["id"]; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        <form id="userEditForm<?php echo $location["id"]; ?>" action="location-admin-query.php" method="POST" enctype="multipart/form-data">
                          <div class="mb-3">
                            <label for="name<?php echo $location["id"]; ?>" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="name" class="form-control" name="name" id="name<?php echo $location["id"]; ?>" value="<?php echo $location["name"]; ?>" required>
                          </div>

                          <div class="mb-3">
                            <label for="lat<?php echo $location["id"]; ?>" class="form-label">Lat <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="lat" id="lat<?php echo $location["id"]; ?>" value="<?php echo $location["lat"]; ?>" required>
                          </div>

                          <div class="mb-3">
                            <label for="lon<?php echo $location["id"]; ?>" class="form-label">Lng <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="lon" id="lon<?php echo $location["id"]; ?>" value="<?php echo $location["lon"]; ?>" required>
                          </div>

                          <div class="mb-3">
                            <label for="description<?php echo $location["id"]; ?>" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" form="userEditForm<?php echo $location["id"]; ?>" id="description<?php echo $location["id"]; ?>" name="description" rows="3" placeholder="Description..." required><?php echo $location["description"]; ?></textarea>
                          </div>

                          <div class="mb-3">
                            <label for="map_url<?php echo $location["id"]; ?>" class="form-label">Map url <span class="text-danger">*</span></label>
                            <textarea class="form-control" form="userEditForm<?php echo $location["id"]; ?>" id="map_url<?php echo $location["id"]; ?>" name="map_url" rows="3" placeholder="Map url..."><?php echo $location["map"]; ?></textarea>
                          </div>

                          <div class="mb-3">
                            <label for="formFile<?php echo $location["id"]; ?>" class="form-label">Picture <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="formFile<?php echo $location["id"]; ?>" name="picture">
                          </div>

                          <div class="mb-3">
                            <label for="description<?php echo $location["id"]; ?>" class="form-label">Type <span class="text-danger">*</span></label>
                            <select id="description<?php echo $location["id"]; ?>" class="form-select" name="type">
                              <option value="-1">Select one type</option>
                              <option value="church"<?php echo $location["type"] == "church" ? " selected" : ""; ?>>Church</option>
                              <option value="culture"<?php echo $location["type"] == "culture" ? " selected" : ""; ?>>Culture</option>
                              <option value="park"<?php echo $location["type"] == "park" ? " selected" : ""; ?>>Park</option>
                              <option value="hotel"<?php echo $location["type"] == "hotel" ? " selected" : ""; ?>>Hotel</option>
                              <option value="sport"<?php echo $location["type"] == "sport" ? " selected" : ""; ?>>Sport</option>
                              <option value="food"<?php echo $location["type"] == "food" ? " selected" : ""; ?>>Food</option>
                              <option value="shop"<?php echo $location["type"] == "shop" ? " selected" : ""; ?>>Shop</option>
                              <option value="transport"<?php echo $location["type"] == "transport" ? " selected" : ""; ?>>Transport</option>
                              <option value="official"<?php echo $location["type"] == "official" ? " selected" : ""; ?>>Official</option>
                            </select>
                          </div>

                          <input type="hidden" name="id" value="<?php echo $location["id"]; ?>" />
                          <input type="hidden" name="location-update" />
                        </form>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          <i class="fa-solid fa-xmark me-1"></i>
                          Cancel
                        </button>
                        <button type="submit" form="userEditForm<?php echo $location["id"]; ?>" class="btn btn-success">
                          <i class="fa-solid fa-floppy-disk me-1"></i>
                          Save Changes
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade text-start" id="userDeleteModal<?php echo $location["id"]; ?>" tabindex="-1" aria-labelledby="userDeleteModal<?php echo $location["id"]; ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h5 class="modal-title" id="userDeleteModal<?php echo $location["id"]; ?>Label">Are you sure want to delete this location?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body text-muted">
                        <?php echo $location["name"]; ?>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          <i class="fa-solid fa-xmark me-1"></i>
                          Cancel
                        </button>
                        <form action="location-admin-query.php" method="POST">
                          <input type="hidden" name="id" value="<?php echo $location["id"]; ?>" />

                          <button type="submit" name="location-delete" class="btn btn-danger">
                            <i class="fa-solid fa-trash-can me-1"></i>
                            Delete
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          <?php
            endwhile;

            if ($query->rowCount() < 1):
          ?>
            <tr>
              <td colspan="7" class="text-center text-muted">
                <i class="fa-solid fa-circle-xmark my-3 fa-xl d-block"></i>
                No data
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
	</div>

	<?php include "../components/footer.php"; ?>
</body>
</html>
