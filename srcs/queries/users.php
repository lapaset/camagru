<?php

	function get_user($pdo, $login_name) {
		$user = $pdo->prepare("SELECT id, active, pw FROM users 
								WHERE login_name = :username;");
		$user->execute(array(':username' => $login_name ));

		return $user->fetch(PDO::FETCH_ASSOC);
	}

	function get_user_by_email($pdo, $email, $verify_hash) {
		$user = $pdo->prepare("SELECT id, active FROM users WHERE email = :email
								AND verify_hash = :verify_hash;");
		$user->execute(array(':email' => $email,
								':verify_hash' => $hash ));

		return $user->fetch(PDO::FETCH_ASSOC);
	}

	function add_user($pdo, $username, $email, $pw, $verify_hash) {
		$user_to_add = $pdo->prepare('INSERT INTO users(login_name, email, pw, verify_hash)
										VALUES (:username, :email, :pw, :verify_hash);');
		$user_to_add->execute(array(':username' => $username,
									':email' => $email,
									':pw' => $pw,
									':verify_hash' => $verify_hash ));
	}

	function activate_user($pdo, $id) {
		$update = $pdo->prepare("UPDATE users SET active = 'active'
									WHERE id = :id;");
		$update->execute(array(':id' => $id ));
	}

	function update_pw($pdo, $pw, $id) {
		$update = $pdo->prepare("UPDATE users SET pw = :pw WHERE id = :id;");
		$update->execute(array(':pw' => $pw,
								':id' => $id ));
	}

	function update_verify_hash($pdo, $id, $verify_hash) {
		$update = $pdo->prepare("UPDATE users SET verify_hash = :verify_hash
									WHERE id = :id;");
		$update->execute(array(':id' => $id,
								':verify_hash' => $verify_hash ));
	}

	function update_verify_hash_by_email($pdo, $email, $verify_hash) {
		$user = $pdo->prepare("UPDATE users SET verify_hash = :verify_hash
								WHERE email = :email;");
		$user->execute(array(':email' => $email,
								':verify_hash' => $verify_hash));

		return $user;
	}
?>