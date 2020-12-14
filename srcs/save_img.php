<?php

    session_start();
    date_default_timezone_set('Europe/Helsinki');
    
    if (!$_SESSION['user_id'])
        header("Location: ../index.php");

    function decode_img($data) {
        $data = str_replace('data:image/png;base64,', '', $data);
        $data = str_replace(' ', '+', $data);
        return base64_decode($data);
    }

    function save_img($img, $description) {
        $filename = uniqid();
        imagepng($img, '../imgs/'.$filename.'.png');
        
        require_once '../config/database.php';
        try {
            $table_likes = 'CREATE TABLE IF NOT EXISTS '.$filename.'_likes (
                user_id INT(4) UNSIGNED NOT NULL UNIQUE
            );';
            $table_comments = 'CREATE TABLE IF NOT EXISTS '.$filename.'_comments (
                user_id INT(4) UNSIGNED NOT NULL,
                user_name VARCHAR(30) NOT NULL,
                comment VARCHAR(160) NOT NULL,
                date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            );';

            require_once 'queries/photos.php';
            add_photo($pdo, $filename, $_SESSION['user_id'], $description);

            $pdo->query($table_likes);
            $pdo->query($table_comments);

        } catch (PDOException $e) {
            echo 'Adding the photo failed: '.$e->getMessage();
        }
    }

    if ($_POST) {
        $img = imagecreatefromstring(decode_img($_POST['image-data']));
        imagealphablending($img, true);
        imagesavealpha($img, true);

        $filters = explode(',', $_POST['filters']);

        foreach ($filters as $f) {
            $filter = imagecreatefrompng('../filters/'.$f.'.png');
            $filter_x = imageSX($filter);
            $filter_y = imageSY($filter);

            if (!imagecopy($img, $filter, 0, 0, 0, 0, $filter_x, $filter_y))
                echo 'copying failed';
        }
        save_img($img, $_POST['description']);
        header("Location: editor.php");
    }
    else
        echo 'no image';
?>
