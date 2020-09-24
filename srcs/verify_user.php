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

			if ($_GET['email'] && !empty($_GET['email']) &&
				$_GET['hash'] && !empty($_GET['hash'])) {
				require_once '../config/database.php';
				try {
					$user = $pdo->prepare("SELECT id, active FROM users WHERE email = :email
											AND verify_hash = :verify_hash;");
					$user->execute(array(':email' => $_GET['email'],
										':verify_hash' => $_GET['hash']));
					if ($res = $user->fetch(PDO::FETCH_ASSOC)) {
						if ($res['active'] === 'active')
							echo 'Account is activated,
									please <a href="login.php" title="login" alt="login">login</a>';
						else {
							$update = $pdo->prepare("UPDATE users SET active = 'active'
														WHERE id = :id;");
							$update->execute(array(':id' => $res['id']));
							echo 'Account is now activated,
									please <a href="login.php" title="login" alt="login">login</a>';
						}
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