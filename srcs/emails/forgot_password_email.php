<?php
    $subject = 'Recover your Camagru account';
    $message = '

        Click this link to choose a new password:
        http://localhost:8080/camagru/srcs/recover_password.php?email='.$email.'&hash='.$verify_hash.'
        
        ';

    $message = wordwrap($message, 70, "\n");
    $headers = 'From:noreply@camagru.fi'."\r\n";
?>