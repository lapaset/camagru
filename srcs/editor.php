<!DOCTYPE html>
<html>
<head>
	<title>camagru photo editor</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/editor.css" />
</head>
<body>
	<div class="header">
		<div class="logo-container">
			<a href="../index.php" title="frontpage" >
				<img id="logo" src="../imgs/logo8.png" title="camagru logo" alt="camagru logo" />
			</a>
		</div>
		<div class="login-controls">
			<a href="#" alt="login">login</a> | 
			<a href="#" alt="register">sign up</a>
		</div>
	</div>
	<div class="main-container">
		<div class="preview-container">
			<video id="video-element" autoplay="true" poster="/camagru/images/loading.png">
				Your browser does not support the video tag.
			</video>
			<?php
				require_once 'filter_preview.php';
			?>
			<canvas id="preview-canvas"></canvas>
			
		</div>

		<div class="filter-container">
			<div id="filter-tn-row">
				<?php 
					require_once 'filter_checkboxes.php';
				?>
			</div>
		</div>

		<canvas id="canvas"></canvas>
	</div>
	<div class="footer">
		<div class="footer-side">
			<a href="../index.php" alt="frontpage" title="frontpage">
				<img class="footer-icon" src="../imgs/back.png" title="frontpage" alt="frontpage" />
			</a>
		</div>
		<div class="footer-mid"></div>
		<div class="footer-side">
			<a href="#" alt="settings" title="settings">
				<img class="footer-icon" src="../imgs/settings.png" title="settings" alt="settings" />
			</a>
		</div>
	</div>
</body>
</html>