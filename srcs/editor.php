<?php
	session_start();
	if (!$_SESSION['user'])
		header("Location: ../index.php");

	$footer_left = "frontpage";
	$footer_mid = "";
	$footer_right = "logout";
	$path_to_icons = "../";
	$path_to_srcs = "";
	$location = "editor";
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

		<?php
			require_once 'components/upload_img_form.php';
			require_once 'components/editor_preview.php';
			require_once 'components/filter_checkboxes.php';
			require_once 'components/save_img_form.php';
			require_once 'components/user_photo_grid.php';
		?>

		<canvas id="img-container"></canvas>

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
	