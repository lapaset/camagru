<?php
    $subject = 'A new Camagru comment';
    $message = $_SESSION['user'].' commented your photo!
        
        http://localhost:8080/camagru
        
        ';

    $message = wordwrap($message, 70, "\n");
    $headers = 'From:noreply@camagru.fi'."\r\n";
?>