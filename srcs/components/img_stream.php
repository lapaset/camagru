<?php
	require_once 'config/database.php';

	$photos = $pdo->query('SELECT id, description FROM photos ORDER BY date DESC;');

	foreach ($photos as $row) {
		if (file_exists('imgs/'.$row['id'].'.png')) {
			$liked = $pdo->query('SELECT * FROM '.$row['id'].'_likes
									WHERE user_id = '.$_SESSION['user_id'].' LIMIT 1;')->rowCount();
			$likes = $pdo->query('SELECT count(*) FROM '.$row['id'].'_likes')->fetchColumn(); 
			
			echo 	'<div class="photo-container">
						<img
							class="stream-img"
							src="imgs/'.$row['id'].'.png"
							alt="'.$row['description'].'"
							title="'.$row['description'].'" /> <br />';
									
			if ($liked === 1)
				echo 	'<img class="like-icon" src="icons/like.png"
							alt="not liked" title="not liked" /> '.$likes.' likes</br>';
			
			else
				echo 	'<form class="like-img-form" action="srcs/like_img.php" method="post">
							<input type="hidden" name="photo_id" value="'.$row['id'].'" />
							<input class="like-icon" type="image" src="icons/like_outline.png"
								alt="not liked" title="not liked" /> '.$likes.' likes</br>
						</form>';

			echo $row['description']
					.'<div class="comments">
					<h3>comments</h3>	
					</div>';
				
			
			echo '</div>';
		} else
			$pdo->query('DELETE FROM photos WHERE id="'.$row['id'].'";');
	}

	echo $img_stream;

?>