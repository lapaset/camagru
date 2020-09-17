<?php

	session_start();
	if (!$_SESSION['user'])
		header("Location: ../index.php");
	//delete also comments and likes
	if ($_POST && $_POST['photo_id']) {
		require_once '../config/database.php';
		$pdo->query('DELETE FROM photos WHERE id="'.$_POST['photo_id'].'";');
		unlink('../imgs/'.$_POST['photo_id']);
	}

	header("Location: editor.php");

?>