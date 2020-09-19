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
			echo '<div class="header">
					<a id="register" href="srcs/register.php" alt="register"
						title="register">register</a>
				</div>';
	?>

	<div class="main-container">
		<h1>camagru</h1>

		<?php require_once 'srcs/components/img_stream.php'; ?>

		<div style="text-align: right; padding: 1rem; border-top: 1px solid black" >
			Thank you for your visit!<br />
			<a href="http://github.com/lapaset" title="my github profile"
				alt="my github profile" >Liisa Lahti</a> 2020<br/>
		</div>
	</div>

	<?php
		if ($_SESSION['user'])
			echo '	<div class="left-bottom-corner">
						<a href="srcs/editor.php" alt="add photo" title="add photo">
							<div class="circle-container">
								<img id="add" src="icons/add.png" title="add photo"
									alt="add photo" />
							</div>
						</a>
					</div>';
	?>

	<script src="srcs/js/scrollPosition.js"></script>

	<?php 
		require_once 'srcs/components/footer.php';
		require_once 'srcs/components/mobile_footer.php';
	?>



