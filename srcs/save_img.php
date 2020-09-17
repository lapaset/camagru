<?php
    session_start();
    if (!$_SESSION['user'])
        header("Location: ../index.php");

    //todo: check the sessions at every page

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
            $table_comments = 'CREATE TABLE IF NOT EXISTS '.$id.'_comments (
                user_id INT(4) UNSIGNED NOT NULL,
                comment VARCHAR(60) NOT NULL,
                date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            );';

            $img_to_add = $pdo->prepare('INSERT IGNORE INTO photos(id, user_id, description)
                VALUES (:id, :user_id, :description);');
            $img_to_add->execute(array(':id' => $filename, ':user_id' => $_SESSION['user_id'],
                                        ':description' => $description));
            $pdo->query($table_likes);
            $pdo->query($table_comments);

        } catch (PDOException $e) {
            echo 'Adding the photo failed: '.$e->getMessage();
        }
    }

    
//todo: why semicolon at image description leads to copying failed
//editor has the post thing
//OR save_img returns you to editor

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

