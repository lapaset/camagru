<div class="preview-container">
	<video id="video-element" autoplay="true" poster="../icons/loading.png">
		Your browser does not support the video tag.
	</video>
	<?php
		require_once 'components/filter_preview.php';
	?>
	<canvas id="preview-canvas"></canvas>
	<div class="lens-container">
		<div class="circle-container">
			<input type="image" id="take-photo-button" onclick="snap()"
				src="../icons/lens.png" title="take photo" alt="take photo" disabled/>
			<input type="image" id="refresh-button" onclick="refresh()"
				src="../icons/refresh.png" title="new photo" alt="new photo" />
		</div>
	</div>
</div>