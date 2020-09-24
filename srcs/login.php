<?php
    session_start();
    $footer_left = "frontpage";
	$footer_mid = "";
	$footer_right = "";
	$path_to_icons = "../";
	$path_to_srcs = "";
?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/layout.css" />
</head>
<body>
    <?php require_once 'components/frontpage_arrow.php' ?>

    <div class="main-container">
        <h1>login</h1>
        <?php
            require_once 'components/login_form.php';

            function authorized() {
                require_once '../config/database.php';

                $res = $pdo->prepare("SELECT id, active, pw FROM users 
                            WHERE login_name = :username;");
                $res->execute(array(':username' => $_POST['login']));

                if (!$user = $res->fetch(PDO::FETCH_ASSOC))
                    return FALSE;

                if ($user['active'] !== 'active' || !password_verify($_POST['pw'], $user['pw']))
                    return FALSE;

                $_SESSION['user'] = $_POST['login'];
                $_SESSION['user_id'] = $user['id'];
                return TRUE;
            }

            if ($_POST) {
                if (!authorized())
                    echo '<div class="msg">Invalid username or password</div>'.$login_form;
                else 
                    header("Location: ../index.php");
            }
            else
                echo $login_form;
        ?>
    </div>
    <?php 
		require_once 'components/mobile_footer.php';
	?>