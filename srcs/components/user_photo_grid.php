<h2>your photos</h2>
<div class="grid-container">
	<?php
		require_once '../config/database.php';
		require_once 'queries/photos.php';

		$photos = get_user_photos($pdo, $_SESSION['user_id']);

		foreach ($photos as $row) {
			$description = htmlspecialchars($row['description']);

			if (file_exists('../imgs/'.$row['id'].'.png'))
				echo '<div class="grid-item">
							<img class="grid-image" src="../imgs/'.$row['id'].'.png"
								alt="'.$description.'"
								title="'.$description.'" /><br />
								
							<div class="delete-img-form-container">
								<form class="delete-img-form" action="delete_img.php" method="post">
									<input type="hidden" name="photo_id" value="'.$row['id'].'" />
									<input type="hidden" name="location" value="'.$location.'" />
									<input class="trash-icon" type="image" src="../icons/delete.png"
										alt="delete photo" title="delete photo" />
								</form>
							</div>

						</div>';
			else
				delete_photo($pdo, $row['id']);
		}
	?>
</div>
