<?php
	session_start();

	if ($_SESSION['user'] && $_POST && $_POST['photo_id']) {
		require_once '../config/database.php';
		require_once 'queries/photos.php';

		try {
			delete_photo($pdo, $_POST['photo_id']);
			$pdo->query('DROP TABLE '.$_POST['photo_id'].'_likes;');
			$pdo->query('DROP TABLE '.$_POST['photo_id'].'_comments;');	
		} catch (PDOException $e) {
			echo 'Deleting the photo failed: '.$e->getMessage();
		}

		unlink('../imgs/'.$_POST['photo_id'].'.png');

		if ($_POST['location'] === 'editor')
			header("Location: editor.php");
		else
			header("Location: profile.php");
	} else 
		header("Location: ../index.php");
?>