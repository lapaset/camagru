<h2>your photos</h2>
<div class="grid-container">
	<?php
		require_once '../config/database.php';

		foreach ($pdo->query('SELECT id, description FROM photos WHERE user_id='.$_SESSION['user_id'].' ORDER BY date DESC;') as $row) {
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
				$pdo->query('DELETE FROM photos WHERE id="'.$row['id'].'";');
		}
	?>
</div>
