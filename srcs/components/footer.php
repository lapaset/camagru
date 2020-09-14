<div class="footer">
	<?php
		require_once 'footer_links.php';

		if ($footer_mid)
			echo '	<div class="footer-img">
						'.${$footer_mid}.'
					</div>';
		if ($footer_right)
			echo '	<div class="footer-img">
						'.${$footer_right}.'
					</div>';
	?>
</div>

