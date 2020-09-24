<?php
	session_start();
	if (!$_SESSION['user'])
		header("Location: ../index.php");

    $footer_left = "frontpage";
	$footer_mid = "";
	$footer_right = "logout";
	$path_to_icons = "../";
	$path_to_srcs = "";
	$msg = "";
	$location = "profile";

	require_once '../config/database.php';

	if ($_POST) {
		$username = $_POST['login'];
		$email = $_POST['email'];
		$update_query = 'UPDATE users SET ';
		$update_array = [];

		if ($username) {
			$update_query = $update_query.'login_name=:username, ';
			$update_array[':username'] = $username; 
		}

		if ($email) {
			$update_query = $update_query.'email=:email, ';
			$update_array[':email'] = $email;
		}

		if ($_POST['pw']) {
			$pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
			$update_query = $update_query.'pw=:pw, ';
			$update_array[':pw'] = $pw; 
		}

		$update_query = $update_query.'notifications=:notifications ';
		$update_array[':notifications'] = $_POST['notifications']; 

		try {
			$update_query = $update_query.'WHERE id='.$_SESSION['user_id'].';';
			$update = $pdo->prepare($update_query);
			$update->execute($update_array);
			
			if ($username)
				$_SESSION['user'] = $username;
			$msg = 'Profile updated';
			
		} catch (PDOException $e) {
			if (strpos($e->getMessage(), 'Duplicate entry'))
				$msg =  'Username or email already exists.';
			else
				$msg =	'Something went wrong.<br />
							'.$e->getMessage();
		}
		
	}

	$profile = $pdo->query('SELECT * FROM users WHERE id='.$_SESSION['user_id'].';');
	$profile = $profile->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/layout.css" />
</head>
<body>
	<?php require_once 'components/frontpage_arrow.php' ?>
	
    <div class="main-container">
		<h1>profile</h1>

		
		<?php
			if ($msg !== '') 
				echo '<div class="msg">'.$msg.'</div>';
			require_once 'components/profile_update_form.php';
			require_once 'components/user_photo_grid.php';
		?>
	</div>

	<?php
		require_once 'components/footer.php';
		require_once 'components/mobile_footer.php';
	?>