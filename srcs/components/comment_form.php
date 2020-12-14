<?php

	if ($_SESSION['user'])
		echo 	'<div class="comment-form-container">
					<form class="comment-img-form" action="srcs/comment_img.php" method="post">
						<input type="hidden" name="photo_id" value="'.$row['id'].'" />
						<input type="hidden" name="notifications" value="'.$row['notifications'].'" />
						<input type="hidden" name="email" value="'.$row['email'].'" />
						<input id="comment-field" type="text" name="comment" value="" placeholder="comment" maxlength="160" />
						<input id="comment-button" type="submit" name="submit" value="send" />
					</form>
				</div>';

?>