<?php
    require_once 'database.php';
    
    //todo: setup time zone!

    function init_photos($pdo) {
        $dir = '../imgs';
        $files = scandir($dir);

        $table_photos = "CREATE TABLE IF NOT EXISTS photos (
            id VARCHAR(30) NOT NULL UNIQUE PRIMARY KEY,
            user_id INT(4) UNSIGNED NOT NULL,
            description VARCHAR(60) NOT NULL,
            likes INT(4) NOT NULL DEFAULT 0,
            date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        );";

        $pdo->query($table_photos);

        foreach ($files as $filename) {

            if (strpos($filename, '.jpg') === strlen($filename) - 4 ||
                strpos($filename, '.png') === strlen($filename) - 4 ||
                strpos($filename, '.jpeg') === strlen($filename) - 5) {

                    $img_to_add = $pdo->prepare('INSERT IGNORE INTO photos(id, user_id, description)
                        VALUES (:id, 1, :description);');
                    $img_to_add->execute(array(':id' => $filename, ':description' => "test"));
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

        $photos_exist = $pdo->prepare("SELECT * FROM information_schema.tables WHERE table_schema = 'llahti' AND table_name = 'photos' LIMIT 1;");
        $photos_exist->execute();
        if ($photos_exist->rowCount() < 1)
            init_photos($pdo);
        echo "Database setup succesfull";

    } catch (PDOException $e) {
        echo 'connection failed: '.$e->getMessage();
        die();
    }
?>