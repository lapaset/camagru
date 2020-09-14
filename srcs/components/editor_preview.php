<div class="preview-container">
	<video id="video-element" autoplay="true" poster="/camagru/images/loading.png">
		Your browser does not support the video tag.
	</video>
	<?php
		require_once 'components/filter_preview.php';
	?>
	<canvas id="preview-canvas"></canvas>
	<div class="lens-container">
		<div class="circle-container">
			<input type="image" id="take-photo-icon" src="../icons/lens.png" title="take photo" alt="take photo" disabled/>
			<input type="image" id="refresh-icon" src="../icons/refresh.png" title="new photo" alt="new photo" />
		</div>
	</div>
</div>