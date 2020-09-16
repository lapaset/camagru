<?php
	session_start();
	if (!$_SESSION['user'])
		header("Location: ../index.php");

	$upload_form = '<form method="post" enctype="multipart/form-data">
						Select image to upload:
						<input type="file" name="file-to-upload" id="file-to-upload">
						<input type="submit" value="upload Image" name="submit">
					</form>';

	if ($_POST && isset($_POST['submit'])) {
		$target_dir = '../temp/';
		$target_file = $target_dir.basename($_FILES['file-to-upload']['name']);
		$upload_ok = true;
		$image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		$check = getimagesize($_FILES['file-to-upload']['tmp_name']);
		if ($check === false) {
			$upload_ok = false;
			echo 'file is not an image'.$upload_form;
		}
		if (file_exists($target_file)) {
			$upload_ok = false;
			echo 'file already exists'.$upload_form;
		}
		if ($_FILES['file-to-upload']['size'] > 50000)
			$upload_ok = false;
			echo 'file is too big'.$upload_form;

	} else
		echo $upload_form;

