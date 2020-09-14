<?php
    session_start();
    //session_destroy();
    $_SESSION['user'] = "";
    $_SESSION['user_id'] = "";
    header("Location: ../index.php");
?>