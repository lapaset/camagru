<?php
	session_start();
	if (!$_SESSION['user'])
		header("Location: ../index.php");

	$footer_left = "frontpage";
	$footer_mid = "";
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

		<div id="upload-form">
			<div class="form-container">
				select at least one filter or upload an image to take a photo<br />
				(recommended size 600 x 400 px)<br />
				<input type="file" id="image-loader" name="imageLoader"
					accept="image" />
			</div>
		</div>

		<?php require_once 'components/editor_preview.php'; ?>

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
					value="" placeholder="description" maxlength="160" />
				<input type="button" onclick="save()" value="save" />
			</form>
		</div>
		
		<?php require_once 'components/user_photo_grid.php'; ?>

		<canvas id="canvas"></canvas>

		
	</div>

	<?php require_once 'components/footer.php'; ?>

	<div class="mobile-footer">
		<div class="mobile-footer-img">
			<?php 
				if ($footer_left)
					echo ${$footer_left};
			?>
		</div>
		<div class="mobile-footer-img">
		</div>
		<div class="mobile-footer-img">
			<?php 
				if ($footer_right)
					echo ${$footer_right};
			?>
		</div>	
	</div>

	<script src="js/editor.js" ></script>
	
</body>
</html>
	