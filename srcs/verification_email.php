<?php
    $subject = 'Verify your Camagru account';
    $message = '

        Thank you for signing up!
        Click this link to activate your account:
        http://localhost:8080/camagru/srcs/verify_new_user.php?email='.$email.'&hash='.$verify_hash.'
        
        ';

    $message = wordwrap($message, 70, "\n");
    $headers = 'From:noreply@camagru.fi'."\r\n";
    mail($email, $subject, $message, $headers);
?>