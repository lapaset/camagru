<?php
	session_start();

	$footer_left = "";
	$footer_mid = "";
	$footer_right = "login";

	if ($_SESSION['user']) {
		$footer_left = "editor";
		$footer_mid = "profile";
		$footer_right = "logout";
	}

	$path_to_icons = "";
	$path_to_srcs = "srcs/";
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>camagru</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/index.css" />
</head>
<body>

	<?php
		if (!$_SESSION['user'])
			require_once 'srcs/components/register_header.php';
	?>

	<div class="main-container">
		<h1>camagru</h1>

		<?php
			require_once 'srcs/img_stream.php';
			require_once 'srcs/components/index_signature_footer.php';
		?>

		<script src="srcs/js/scrollPosition.js"></script>
	</div>

	<?php
		if ($_SESSION['user'])
			require_once 'srcs/components/add_photo_button.php';
	?>

	

	<?php 
		require_once 'srcs/components/footer.php';
		require_once 'srcs/components/mobile_footer.php';
	?>



