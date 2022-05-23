<?php
	session_start();

	$from_admin = false;
  	$active_page = "home";

	require_once "../conn.php";

	$current_user = $_SESSION["current_user"];

	if (!isset($current_user)) {
		return header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home • BizKod</title>
  <?php include "../components/head.php"; ?>
</head>
<body>
	<?php include "../components/navbar.php"; ?>

	<div class="px-3 bg-white">
		<h3 class="text-primary">Home Page</h3>
		<hr style="border-top: 1px dotted #ccc;"/>

		<?php include "../components/alert.php"; ?>

		<div id="map"></div>

		<form class="d-flex flex-wrap mt-3 justify-content-center align-items-center" method="get" action="home.php">
			<div class="container">
				<div class="row">
					<div class="form-check form-switch col">
						<input class="form-check-input" name="check[]" type="checkbox" id="church" value="church"<?php if(isset($_GET["check"])) foreach($_GET["check"] as $check) echo $check == "church" ? " checked" : ""; ?>>
						<label class="form-check-label" for="church">Church</label>
					</div>
					<div class="form-check form-switch col">
						<input class="form-check-input" name="check[]" type="checkbox" id="culture" value="culture"<?php if(isset($_GET["check"])) foreach($_GET["check"] as $check) echo $check == "culture" ? " checked" : ""; ?>>
						<label class="form-check-label" for="culture">Culture</label>
					</div>
					<div class="form-check form-switch col">
						<input class="form-check-input" name="check[]" type="checkbox" id="park" value="park"<?php if(isset($_GET["check"])) foreach($_GET["check"] as $check) echo $check == "park" ? " checked" : ""; ?>>
						<label class="form-check-label" for="park">Park</label>
					</div>
				</div>
				<div class="row">
					<div class="form-check form-switch col">
						<input class="form-check-input" name="check[]" type="checkbox" id="sport" value="sport"<?php if(isset($_GET["check"])) foreach($_GET["check"] as $check) echo $check == "sport" ? " checked" : ""; ?>>
						<label class="form-check-label" for="sport">Sport</label>
					</div>
					<div class="form-check form-switch col">
						<input class="form-check-input" name="check[]" type="checkbox" id="shop" value="shop"<?php if(isset($_GET["check"])) foreach($_GET["check"] as $check) echo $check == "shop" ? " checked" : ""; ?>>
						<label class="form-check-label" for="shop">Shop</label>
					</div>
					<div class="form-check form-switch col">
						<input class="form-check-input" name="check[]" type="checkbox" id="hotel" value="hotel"<?php if(isset($_GET["check"])) foreach($_GET["check"] as $check) echo $check == "hotel" ? " checked" : ""; ?>>
						<label class="form-check-label" for="hotel">Hotel</label>
					</div>
				</div>
				<div class="row">
					<div class="form-check form-switch col">
						<input class="form-check-input" name="check[]" type="checkbox" id="transport" value="transport"<?php if(isset($_GET["check"])) foreach($_GET["check"] as $check) echo $check == "transport" ? " checked" : ""; ?>>
						<label class="form-check-label" for="transport">Transport</label>
					</div>
					<div class="form-check form-switch col">
						<input class="form-check-input" name="check[]" type="checkbox" id="food" value="food"<?php if(isset($_GET["check"])) foreach($_GET["check"] as $check) echo $check == "food" ? " checked" : ""; ?>>
						<label class="form-check-label" for="food">Food</label>
					</div>
					<div class="form-check form-switch col">
						<input class="form-check-input" name="check[]" type="checkbox" id="official" value="official"<?php if(isset($_GET["check"])) foreach($_GET["check"] as $check) echo $check == "official" ? " checked" : ""; ?>>
						<label class="form-check-label" for="official">Official</label>
					</div>
				</div>

				<div class="filters-grid--submit text-center mt-3">
					<button type="submit" class="btn btn-primary">
						<i class="fa-solid fa-filter me-1"></i>
						Submit
					</button>
				</div>
			</div>
		</form>
	</div>

	<?php include "../components/footer.php"; ?>
	

	<script>
		const map = L.map('map').setView([46.10289612591827, 19.667341720175024], 15);

		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZmFiaWFuZGFuaWVsMDAiLCJhIjoiY2wxbTF5Z3I4MGdqajNka3FiZDMxNHdvbCJ9.pURJ4GNmtHbERjXSCXc9iw', {
			maxZoom: 18,
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1
		}).addTo(map);

		<?php
		$sql = "";
		if(isset($_GET["check"]))
		{
			if(count($_GET["check"]) == 1)
			{
				$sql = "SELECT `id`, `name`, `lat`, `lon`, `picture` FROM `location` WHERE `type` = '" . $_GET["check"][0] ."';";
			}
			else{
				$sql = "SELECT `id`, `name`, `lat`, `lon`, `picture` FROM `location` WHERE `type` = '" . $_GET["check"][0] . "'";
				for($k=1;$k<count($_GET["check"]);$k++)
				{
					$sql .= " OR type = '" . $_GET["check"][$k] . "'";
				}
				$sql .= ";";
			}
		}
		else{
			$sql = "SELECT `id`, `name`, `lat`, `lon`, `picture` FROM `location`;";
		}

			$query = $conn->prepare($sql);
			$query->execute();

			while ($location = $query->fetch()):
		?>
			const marker<?php echo $location["id"]; ?> = L.marker([<?php echo $location["lat"]; ?>, <?php echo $location["lon"]; ?>]).addTo(map);
			marker<?php echo $location["id"]; ?>.bindPopup(`
				<a href="location.php?location-id=<?php echo $location["id"]; ?>" class="d-block text-center rounded-3">
				<?php echo $location["name"]; ?><br /><br />
					<img src="../images/map/<?php echo $location["picture"]; ?>" alt="<?php echo $location["name"]; ?>" width="200px" />
				</a>
			`);
		<?php endwhile; ?>
	</script>
</body>
</html>
