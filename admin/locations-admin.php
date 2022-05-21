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
              <form id="userInsertForm" action="user-admin-query.php" method="POST">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="name" class="form-control" name="name" id="name" value="<?php echo $has_inputs ? $inputs["name"] : ""; ?>" required>
                </div>

                <div class="mb-3">
                  <label for="lat" class="form-label">Lat</label>
                  <input type="text" class="form-control" name="lat" id="lat" value="<?php echo $has_inputs ? $inputs["lat"] : ""; ?>" required>
                </div>

                <div class="mb-3">
                  <label for="lon" class="form-label">Lon</label>
                  <input type="text" class="form-control" name="lon" id="lon" value="<?php echo $has_inputs ? $inputs["lon"] : ""; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="picture" class="form-label">Choose image</label>
                    <input class="form-control" type="file" id="picture">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" id="description" required>
                </div>

                <!-- <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" name="is_admin" id="is_admin"<?php echo $has_inputs ? ($inputs["is_admin"] ? " checked" : "") : ""; ?>>
                  <label class="form-check-label" for="is_admin">Is Admin</label>
                </div>

                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" name="is_verified" id="is_verified"<?php echo $has_inputs ? ($inputs["is_verified"] ? " checked" : "") : ""; ?>>
                  <label class="form-check-label" for="is_verified">Is Verified</label>
                </div> -->

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
                <th>Description</th>
            </tr>
        </thead>

        <tbody>
          <?php
            unset($_SESSION["inputs"]);

            $sql = "SELECT `id`, `email`, `firstname`, `lastname`, `is_admin`, `is_verified` FROM `user`;";
            $query = $conn->prepare($sql);
            $query->execute();

            while ($user = $query->fetch()):
          ?>
            <tr>
              <td><?php echo $user["id"]; ?></td>
              <td><?php echo $user["email"]; ?></td>
              <td><?php echo $user["firstname"]; ?></td>
              <td><?php echo $user["lastname"]; ?></td>
              <td>
                <span class="badge bg-<?php echo $user["is_admin"] ? "success" : "danger"; ?>">
                  <?php echo $user["is_admin"] ? "True" : "False"; ?>
                </span>
              </td>
              <td>
                <span class="badge bg-<?php echo $user["is_verified"] ? "success" : "danger"; ?>">
                  <?php echo $user["is_verified"] ? "True" : "False"; ?>
                </span>
              </td>
              <td class="d-flex justify-content-center gap-3">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#userEditModal<?php echo $user["id"]; ?>">
                  <i class="fa-solid fa-pen-to-square me-1"></i>
                  Edit
                </button>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#userDeleteModal<?php echo $user["id"]; ?>">
                  <i class="fa-solid fa-trash-can me-1"></i>
                  Delete
                </button>

                <div class="modal fade" id="userEditModal<?php echo $user["id"]; ?>" tabindex="-1" aria-labelledby="userEditModal<?php echo $user["id"]; ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h5 class="modal-title" id="userEditModal<?php echo $user["id"]; ?>Label">Edit User #<?php echo $user["id"]; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        <form id="editUserForm<?php echo $user["id"]; ?>" action="user-admin-query.php" method="POST">
                          <div class="mb-3">
                            <label for="email<?php echo $user["id"]; ?>" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email<?php echo $user["id"]; ?>" value="<?php echo $user["email"]; ?>" required>
                          </div>

                          <div class="mb-3">
                            <label for="firstname<?php echo $user["id"]; ?>" class="form-label">Firstname</label>
                            <input type="text" class="form-control" name="firstname" id="firstname<?php echo $user["id"]; ?>" value="<?php echo $user["firstname"]; ?>" required>
                          </div>

                          <div class="mb-3">
                            <label for="lastname<?php echo $user["id"]; ?>" class="form-label">Lastname</label>
                            <input type="text" class="form-control" name="lastname" id="lastname<?php echo $user["id"]; ?>" value="<?php echo $user["lastname"]; ?>" required>
                          </div>

                          <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="is_admin" id="is_admin<?php echo $user["id"]; ?>"<?php echo $user["is_admin"] ? " checked" : ""; ?>>
                            <label class="form-check-label" for="is_admin<?php echo $user["id"]; ?>">Is Admin</label>
                          </div>

                          <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="is_verified" id="is_verified<?php echo $user["id"]; ?>"<?php echo $user["is_verified"] ? " checked" : ""; ?>>
                            <label class="form-check-label" for="is_verified<?php echo $user["id"]; ?>">Is Verified</label>
                          </div>

                          <input type="hidden" name="id" value="<?php echo $user["id"]; ?>" />
                          <input type="hidden" name="user-update" />
                        </form>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          <i class="fa-solid fa-xmark me-1"></i>
                          Cancel
                        </button>
                        <button type="submit" form="editUserForm<?php echo $user["id"]; ?>" class="btn btn-success">
                          <i class="fa-solid fa-floppy-disk me-1"></i>
                          Save Changes
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="userDeleteModal<?php echo $user["id"]; ?>" tabindex="-1" aria-labelledby="userDeleteModal<?php echo $user["id"]; ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h5 class="modal-title" id="userDeleteModal<?php echo $user["id"]; ?>Label">Are you sure want to delete this user?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body text-muted">
                        <?php echo $user["email"]; ?>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          <i class="fa-solid fa-xmark me-1"></i>
                          Cancel
                        </button>
                        <form action="user-admin-query.php" method="POST">
                          <input type="hidden" name="id" value="<?php echo $user["id"]; ?>" />

                          <button type="submit" name="user-delete" class="btn btn-danger">
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
