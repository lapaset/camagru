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
		<div class="frontpage-link">
			<a href="../index.php" alt="frontpage" title="frontpage">
				<img id="back-icon" src="../imgs/back.png" title="back" alt="back" />
			</a>
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
		<div class="footer-img">
			<a href="#" alt="settings" title="settings">
				<img id="settings-icon" src="../imgs/settings.png" title="settings" alt="settings" />
			</a>
		</div>
		<div class="footer-img">
			<a href="#" alt="logout" title="logout">
				<img id="logout-icon" src="../imgs/logout.png" title="logout" alt="logout" />
			</a>
		</div>
	</div>

	<div class="mobile-footer">
		<div class="mobile-footer-img">
			<a href="../index.php" alt="frontpage" title="frontpage">
				<img id="back-icon" src="../imgs/back.png" title="back" alt="back" />
			</a>
		</div>
		<div class="mobile-footer-img">
			<input type="image" id="take-photo-icon" src="../imgs/lens.png" title="take photo" alt="take photo" disabled/>
			<input type="image" id="refresh-icon" src="../imgs/refresh.png" title="new photo" alt="new photo" />
		</div>
		<div class="mobile-footer-img">
			<a href="#" alt="logout" title="logout">
				<img id="logout-icon" src="../imgs/logout.png" title="logout" alt="logout" />
			</a>
		</div>
	</div>

</body>
</html>