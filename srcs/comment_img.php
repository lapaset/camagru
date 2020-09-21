<?php
	session_start();
	
	if ($_SESSION['user'] && isset($_POST) && $_POST['photo_id'] && $_POST['photo_owner'] && $_POST['comment']) {
		
		require_once '../config/database.php';
		$send_comment = $pdo->prepare('INSERT INTO '.$_POST['photo_id'].'_comments(user_id, user_name, comment)
							VALUES (:user_id, :user_name, :comment);');
		$send_comment->execute(array(':user_id' => $_SESSION['user_id'],
										':user_name' => $_SESSION['user'],
										':comment' => $_POST['comment']));

		$photo_owner = $pdo->query('SELECT email FROM users
							WHERE login_name="'.$_POST['photo_owner'].'"
							AND notifications="on";');
		if ($owner = $photo_owner->fetch(PDO::FETCH_ASSOC)) {
			require_once 'emails/comment_email.php';
			mail($email, $subject, $message, $headers);
		}		
	}

	header("Location: ../index.php");
?>