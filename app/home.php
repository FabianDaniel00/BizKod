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

		<h2>Map</h2>

		<div id="map"></div>
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
			$sql = "SELECT `id`, `name`, `lat`, `lon`, `picture` FROM `location`;";
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
