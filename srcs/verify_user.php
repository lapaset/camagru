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
	<title>verify user</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/layout.css" />
</head>
<body>
	<?php require_once 'components/frontpage_arrow.php' ?>

	<div class="main-container">
		<h1>Verify account</h1>
		<div class="msg">
		<?php

			if ($_GET['email'] && !empty($_GET['email']) && $_GET['hash'] && !empty($_GET['hash'])) {
				require_once '../config/database.php';
				require_once 'queries/users.php';

				try {
					if ($user = get_user_by_email($pdo, $_GET['email'], $_GET['hash'])) {

						if ($user['active'] !== 'active')
							activate_user($pdo, $user['id']);

						echo 'Account is activated,
									please <a href="login.php" title="login" alt="login">login</a>';
					}
					else
						echo 'Invalid approach, use the link from your email';

				} catch (PDOException $e) {
					echo 'Something went wrong.<br />'.$e->getMessage();
				}

			} else
				echo 'Invalid approach, use the link from your email';
		?>
		</div>
	</div>
    <?php 
		require_once 'components/mobile_footer.php';
	?>