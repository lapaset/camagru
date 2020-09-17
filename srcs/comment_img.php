<?php
	session_start();
	
	if ($_SESSION['user'] && isset($_POST) && $_POST['photo_id']) {
		require_once '../config/database.php';
		$pdo->query('INSERT INTO '.$_POST['photo_id'].'_comments(user_id, user_name, comment)
						VALUES ('.$_SESSION['user_id'].', "'.$_SESSION['user'].'", "'.$_POST['comment'].'");');
		echo 'here too';
	}

	header("Location: ../index.php");
?>