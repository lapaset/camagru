<?php
	require_once 'config/database.php';
	require_once 'srcs/queries/photos.php';

	$photos = get_all_photos($pdo);

	foreach ($photos as $row) {

		if (file_exists('imgs/'.$row['id'].'.png')) {
			$description = htmlspecialchars($row['description']);

			echo 	'<div class="photo-container">
						<img
							class="stream-img"
							src="imgs/'.$row['id'].'.png"
							alt="'.$description.'"
							title="'.$description.'" /> <br />';
			
			$likes = $pdo->query('SELECT count(*) FROM '.$row['id'].'_likes')->fetchColumn();

			if ($_SESSION['user_id'])
				$liked = $pdo->query('SELECT * FROM '.$row['id'].'_likes
					WHERE user_id = '.$_SESSION['user_id'].' LIMIT 1;')->rowCount();

			if (!$_SESSION['user_id'] || $liked === 1)
				echo 	'<img class="like-icon" src="icons/like.png"
							alt="not liked" title="not liked" /> '.$likes.' likes</br>';
			
			else
				echo 	'<form class="like-img-form" action="srcs/like_img.php" method="post">
							<input type="hidden" name="photo_id" value="'.$row['id'].'" />
							<input type="image" src="icons/like_outline.png"
								alt="not liked" title="not liked" /> '.$likes.' likes</br>
						</form>';

			echo 		'<b>'.$row['login_name'].'</b> '.$description;

			require 'srcs/components/comments.php';
			require 'srcs/components/comment_form.php';
					
			echo 	'</div>';
			
		} else
			delete_photo($pdo, $row['id']);
	}

?>
