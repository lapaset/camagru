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
        <?php
            require_once 'components/register_form.php';

            if ($_POST) {
                require_once '../config/database.php';

                $username = $_POST['login'];
                $email = $_POST['email'];
                $verify_hash = uniqid();

                //should password have at least one number or smthing? can preg_match be used??
                if (!$username || strlen($username) < 4)
                    echo '<div>Username must be at least 4 characters.</div>'.$create_form;
                else if (!$email || empty($email))
                    echo '<div>Email is missing.</div>'.$create_form;
                else if (!$_POST['pw'] || strlen($_POST['pw']) < 8)
                    echo '<div>Password must be at least 8 characters.</div>'.$create_form;
                else {
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
                        echo '<div>Verification message sent, check your email.</div>';
                        
                    } catch (PDOException $e) {
                        if (strpos($e->getMessage(), 'Duplicate entry'))
                            echo    '<div>
                                        Username or email already exists.
                                    </div>
                                    <div>
                                        <a href="forgot_password.php" title="Forgot password" alt="Forgot password">Forgot password</a>
                                    </div>'.$create_form;
                        else
                            echo '<div>Something went wrong.<br />
                                        '.$e->getMessage().'</div>'.$create_form;
                    }
                }
            }
            else {
                echo $create_form;    
            }

        ?>
    </div>
    <?php 
		require_once 'components/mobile_footer.php';
	?>
