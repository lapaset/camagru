<?php
	session_start();

	if ($_SESSION['user'] && $_POST && $_POST['photo_id']) {
		require_once '../config/database.php';
		$pdo->query('DELETE FROM photos WHERE id="'.$_POST['photo_id'].'";');
		$pdo->query('DROP TABLE '.$_POST['photo_id'].'_likes;');
		$pdo->query('DROP TABLE '.$_POST['photo_id'].'_comments;');
		unlink('../imgs/'.$_POST['photo_id']);
	}

	header("Location: editor.php");

?>