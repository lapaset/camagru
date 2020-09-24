<?php
	function add_photo($pdo, $id, $user_id, $description) {
		$img_to_add = $pdo->prepare('INSERT IGNORE INTO photos(id, user_id, description)
                                	VALUES (:id, :user_id, :description);');
        $img_to_add->execute(array(':id' => $id, ':user_id' => $user_id,
                                	':description' => $description));
	}

	function get_all_photos($pdo) {
		$photos = $pdo->query('SELECT photos.id, description, login_name, email, notifications
								FROM photos
								INNER JOIN users
								ON photos.user_id = users.id
								ORDER BY date DESC;');
		return $photos;
	}

	function get_user_photos($pdo, $user_id) {
		$photos = $pdo->query('SELECT id, description
					FROM photos
					WHERE user_id='.$user_id.'
					ORDER BY date DESC;');

		return $photos;
	}

	function delete_photo($pdo, $id) {
		$pdo->query('DELETE FROM photos WHERE id="'.$id.'";');
	}
?>