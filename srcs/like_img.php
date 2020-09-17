<?php
	session_start();
	
	if ($_SESSION['user'] && $_POST && $_POST['photo_id']) {
		require_once '../config/database.php';
		$pdo->query('INSERT IGNORE INTO '.$_POST['photo_id'].'_likes(user_id)
						VALUES ('.$_SESSION['user_id'].');');
	}

	header("Location: ../index.php");

?>