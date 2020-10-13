<?php
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);

    /*$config = array(
        'host' => $server ,
        'user' => $username ,
        'pw' => $password,
        'db' => $db 
    );*/

    $dsn = 'mysql:host='.$server.';dbname='.$db;

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*$pdo->query('CREATE DATABASE IF NOT EXISTS '.$DB_NAME.';');
        $pdo->query('USE '.$DB_NAME.';');*/

    } catch (PDOException $e) {
        echo 'connection failed: '.$e->getMessage();
        die();
    }
?>