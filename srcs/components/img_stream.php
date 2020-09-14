<?php
	require_once 'config/database.php';

	$photos = $pdo->query('SELECT id, description, likes FROM photos ORDER BY date DESC;');			
	
	foreach ($photos as $row) {
		if (file_exists('imgs/'.$row['id']))
			$img_stream = $img_stream
							.'<div class="photo-container">
								<img
									class="stream-img"
									src="imgs/'.$row['id'].'"
									alt="'.$row['description'].'"
									title="'.$row['description'].'" /> <br />'
								.$row['likes'].' likes</br>'
								.$row['description']
							.'</div>';
		else
			$pdo->query('DELETE FROM photos WHERE id="'.$row['id'].'";');
	}

	echo $img_stream;

?>