<?php
    $footer_left = "frontpage";
	$footer_mid = "";
	$footer_right = "";
	$path_to_icons = "../";
	$path_to_srcs = "";
?>

<!DOCTYPE html>
<html>
<head>
	<title>recover password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/layout.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
	<?php require_once 'components/frontpage_arrow.php' ?>

	<div class="main-container">
		<h1>Recover password</h1>
		
		<?php
			require_once '../config/database.php';
			require_once 'queries/users.php';

			if ($_POST['pw'] && $_POST['id']) {
				$pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

				try {
					update_pw($pdo, $pw, $_POST['id']);
					echo 	'<div class="msg">Password updated, please
								<a href="login.php" title="login" alt="login">login</a></div>';

				} catch (PDOException $e) {
					echo 	'<div class="msg">Something went wrong.<br />
								'.$e->getMessage().'</div>';
				}
		
			} else if ($_GET['email'] && !empty($_GET['email']) && $_GET['hash'] && !empty($_GET['hash'])) {
				
				try {

					if ($user = get_user_by_email($pdo, $_GET['email'], $_GET['hash'])) {

						if ($user['active'] !== 'active')
							echo '<div class="msg">Account has not been activated</div>';

						else {
							update_verify_hash($pdo, $user['id'], uniqid());

							echo 	'<div class="form-container">
										<form method="post">
											<label>New password:</label>
											<input id="pw" type="password" name="pw" />
											<input id="confirm_pw" type="password" name="confirm_pw" value="" placeholder="repeat password" />
											<input type="hidden" name="id" value="'.$user['id'].'" />
											<input type="submit" value="OK" />
										</form>
									</div>
									<script src="js/validatePassword.js"></script>';
						}
					} else
						echo '<div class="msg">Invalid approach, the link may be already used</div>';
				
				} catch (PDOException $e) {
					echo '<div class="msg">Something went wrong.<br />
								'.$e->getMessage().'</div>';
				}

			} else
				echo '<div class="msg">Invalid approach, use the link from your email</div>';
		?>
		</div>
	</div>
    <?php 
		require_once 'components/mobile_footer.php';
	?>