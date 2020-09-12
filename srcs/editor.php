<!DOCTYPE html>
<html>
<head>
	<title>camagru photo editor</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="editor.css" />
</head>
<body>
	<div class="header">
		<div class="logo-container">
			<a href="../index.php" title="frontpage" ><h1>camagru</h1></a>
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
</body>
</html>