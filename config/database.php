<?php
    $DB_DSN = 'mysql:host=localhost';
    $DB_NAME = 'llahti';
    $DB_USER = 'root';
    $DB_PASSWORD = 'password';

    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->query('CREATE DATABASE IF NOT EXISTS '.$DB_NAME.';');
        $pdo->query('USE '.$DB_NAME.';');

    } catch (PDOException $e) {
        echo 'connection failed: '.$e->getMessage();
        die();
    }
?>