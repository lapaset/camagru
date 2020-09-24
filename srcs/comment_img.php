<?php
	session_start();

	if ($_SESSION['user'] && isset($_POST) && $_POST['photo_id'] && $_POST['notifications']
		&& $_POST['email'] && $_POST['comment']) {

		require_once '../config/database.php';
		$send_comment = $pdo->prepare('INSERT INTO '.$_POST['photo_id']
							.'_comments(user_id, user_name, comment)
							VALUES (:user_id, :user_name, :comment);');
		$send_comment->execute(array(':user_id' => $_SESSION['user_id'],
										':user_name' => $_SESSION['user'],
										':comment' => $_POST['comment']));

		if ($_POST['notifications'] === 'on') {
			
			require_once 'emails/comment_email.php';
			mail($_POST['email'], $subject, $message, $headers);
		}
	}

	header("Location: ../index.php");
?>