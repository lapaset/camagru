<?php
	session_start();
	if (!$_SESSION['user'])
		header("Location: ../index.php");

	$footer_left = "frontpage";
	$footer_mid = "upload";
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

		<div class="info">
			Select at least one filter to take photo
		</div>

		<div class="filter-container">
			<div id="filter-tn-row">
				<?php require_once 'components/filter_checkboxes.php'; ?>
			</div>
		</div>

		<div class="form-container">
			<form id="save-form" method="post" action="save_img.php">
				<input type="hidden" id="filters" name="filters" />
				<input type="hidden" id="image-data" name="image-data" />
				<input type="text" id="description" name="description"
					value="" placeholder="Description" />
				<input type="button" onclick="save()" value="Save" />
			</form>
		</div>
		
		<?php require_once 'components/user_photo_grid.php'; ?>

		<canvas id="canvas"></canvas>

		<script src="js/editor.js" ></script>
	</div>

	<?php
		require_once 'components/footer.php';
		require_once 'components/mobile_footer.php';
	?>