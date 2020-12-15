<div class="filter-container">
	<div id="filter-tn-row">

		<?php 
			function add_filter_checkbox($name) {
				echo	'<div class="filter-tn">
							<input type="checkbox"
									name="'.$name.'"
									id="'.$name.'"
									onclick="toggleFilter('.$name.')" />
							<label for="'.$name.'">
								<img 	class="checkbox-img"
										src="../filters/'.$name.'.png"
										title="'.$name.'"
										alt="'.$name.'" />
							</label>
						</div>';
			}

			foreach ($filters as $f)
				add_filter_checkbox(substr($f, 0, -4));
		?>
	</div>
</div>