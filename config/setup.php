<?php
    require_once 'database.php';
    
    //todo: setup time zone!

    function init_photos($pdo) {
        $dir = '../imgs';
        $files = scandir($dir);

        $table_photos = 'CREATE TABLE IF NOT EXISTS photos (
            id VARCHAR(30) NOT NULL UNIQUE PRIMARY KEY,
            user_id INT(4) UNSIGNED NOT NULL,
            user_name VARCHAR(30) NOT NULL,
            description VARCHAR(60) NOT NULL,
            date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        );';

        $pdo->query($table_photos);

        foreach ($files as $filename) {

            if (strpos($filename, '.png') === strlen($filename) - 4 ) {

                $id = substr($filename, 0, -4);
                $table_likes = 'CREATE TABLE IF NOT EXISTS '.$id.'_likes (
                    user_id INT(4) UNSIGNED NOT NULL UNIQUE
                );';
                $table_comments = 'CREATE TABLE IF NOT EXISTS '.$id.'_comments (
                    user_id INT(4) UNSIGNED NOT NULL,
                    user_name VARCHAR(30) NOT NULL,
                    comment VARCHAR(60) NOT NULL,
                    date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
                );';

                $img_to_add = $pdo->prepare('INSERT IGNORE INTO photos(id, user_id, user_name, description)
                                VALUES (:id, :user_id, :user_name, :description);');
                $img_to_add->execute(array(':id' => $id, ':user_id' => "1",
                                            ':user_name' => "ulla", ':description' => "The only limitation is your imagination"));
                $pdo->query($table_likes);
                $pdo->query($table_comments);
            }
        }
    }

    try {
        $table_users = "CREATE TABLE IF NOT EXISTS users (
            id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            login_name VARCHAR(30) NOT NULL UNIQUE,
            email VARCHAR(50) NOT NULL UNIQUE,
            pw VARCHAR(600) NOT NULL,
            active ENUM('verify', 'active') DEFAULT 'verify' NOT NULL,
            verify_hash VARCHAR(50) NOT NULL
        );";

        //default user ulla with pw salainensana
        $def_user = 'INSERT IGNORE INTO users (login_name, email, pw, active, verify_hash)
            VALUES("ulla", "li8sa@hotmail.com", "'.password_hash("salainensana", PASSWORD_DEFAULT).'", "active", "verify");';
        $second_user = 'INSERT IGNORE INTO users (login_name, email, pw, active, verify_hash)
            VALUES("lapaset", "llahti@hive.student.fi", "'.password_hash("salainensana", PASSWORD_DEFAULT).'", "active", "verify");';

        $pdo->query($table_users);
        //add default users
        $pdo->query($def_user);
        $pdo->query($second_user);

        $photos_exist = $pdo->query("SELECT * FROM information_schema.tables
                                        WHERE table_schema = 'llahti' 
                                        AND table_name = 'photos' LIMIT 1;");

        if ($photos_exist->rowCount() < 1)
            init_photos($pdo);

        echo "Database setup succesfull";

    } catch (PDOException $e) {
        echo 'connection failed: '.$e->getMessage();
        die();
    }
?>