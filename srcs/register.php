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
	<title>register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/layout.css" />
</head>
<body>
    <?php require_once 'components/frontpage_arrow.php' ?>

    <div class="main-container">
        <h1>register</h1>
        <?php
            require_once 'components/register_form.php';

            if ($_POST) {
                require_once '../config/database.php';

                $username = $_POST['login'];
                $email = $_POST['email'];
                $verify_hash = uniqid();

                if ($username && $email && $_POST['pw']) {

                    $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

                    try {
                        $user_to_add = $pdo->prepare('INSERT INTO users(login_name, email, pw, verify_hash)
                            VALUES (:username, :email, :pw, :verify_hash);');
                        $user_to_add->execute(array(':username' => $username,
                                                    ':email' => $email,
                                                    ':pw' => $pw,
                                                    ':verify_hash' => $verify_hash));

                        require_once 'emails/verification_email.php';
                        mail($email, $subject, $message, $headers);
                        echo '<div class="msg">Verification message sent, check your email.</div>';
                        
                    } catch (PDOException $e) {
                        if (strpos($e->getMessage(), 'Duplicate entry'))
                            echo    '<div class="msg">
                                        Username or email already exists,
                                        <a href="forgot_password.php" title="Forgot password"
                                            alt="Forgot password">forgot password</a>?
                                    </div>'
                                    .$register_form;
                        else
                            echo '<div class="msg">Something went wrong.<br />
                                        '.$e->getMessage().'</div>';
                    }
                }
            } else
                echo $register_form;
        ?>

    </div>
    <?php 
		require_once 'components/mobile_footer.php';
	?>
