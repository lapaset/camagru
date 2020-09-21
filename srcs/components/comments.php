<?php
	
	echo '<div class="comments">';

	$comments = $pdo->query('SELECT * FROM '.$row['id'].'_comments;');

	foreach ($comments as $c) {
		echo '<b>'.$c['user_name'].'</b> '.htmlspecialchars($c['comment']).'<br />';
	}

	echo '</div>';

?>