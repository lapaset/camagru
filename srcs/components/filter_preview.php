<?php
  	function is_png($f) {
		return strpos($f, '.png') === strlen($f) - 4;
	}
	
	$filters = scandir('../filters');
	$filters = array_filter($filters, "is_png");

	foreach ($filters as $f)
		echo '<img id="'.substr($f, 0, -4).'-filter" src="../filters/'.$f.'" />';
?>