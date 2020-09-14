<?php
	$footer_left = "frontpage";
	$footer_mid = "profile";
	$footer_right = "logout";
	$path_to_icons = "../";
	$path_to_srcs = "";
?>

<!DOCTYPE html>
<html>
<head>
	<title>camagru photo editor</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/editor.css" />
</head>
<body>
	<?php require_once 'components/frontpage_arrow.php' ?>
	<div class="main-container">
		<?php require_once 'components/editor_preview.php'; ?>

		<div class="filter-container">
			<div id="filter-tn-row">
				<?php require_once 'components/filter_checkboxes.php'; ?>
			</div>
		</div>

		<div>
			save form here
		</div>

		<?php require_once 'components/photo_grid.php'; ?>


		<canvas id="canvas"></canvas>
	</div>

	<?php
		require_once 'components/footer.php';
		require_once 'components/mobile_footer.php';
	?>