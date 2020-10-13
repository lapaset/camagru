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
	<title>forgot password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/layout.css" />
</head>
<body>
    <?php require_once 'components/frontpage_arrow.php' ?>

    <div class="main-container">
        <h1>forgot</h1>
		<h2>reset password</h2>
        <?php
            require_once 'components/forgot_password_form.php';

            if ($_POST['email'] && !empty($_POST['email'])) {
                require_once '../config/database.php';
                require_once 'queries/users.php';

                try {

                    $verify_hash = uniqid();
                    $email = $_POST['email'];
                    $user = update_verify_hash_by_email($pdo, $email, $verify_hash);

                    if ($user->rowCount() !== 0) {
                        require_once 'emails/forgot_password_email.php';

                        mail($email, $subject, $message, $headers);
                        echo '<div class="msg">Recovery email sent.</div>';
                    } else
                        echo '<div class="msg">Email not found</div>'.$forgot_password_form;

                } catch (PDOException $e) {
                    echo '<div class="msg">Something went wrong.<br />'.$e->getMessage().'</div>';
                }
            } else
                echo $forgot_password_form;
        ?>
    </div>
    <?php 
		require_once 'components/mobile_footer.php';
	?>
