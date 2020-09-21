<div class="form-container">
	<form method="post">
		<label>Username: <?php echo $profile['login_name']; ?></label><br />
		<input type="text" id="username" name="login" value="" placeholder="new username" />

		<label>Email: <?php echo $profile['email']; ?></label><br />
		<input type="email" name="email" value="" placeholder="new email" />

		<label>Update password:</label><br />
		<input type="password" id="pw" name="pw" value="" placeholder="new password" />
		<input type="password" id="confirm_pw" name="confirm_pw" value="" placeholder="new password again" />

		<label>Email notifications:</label><br />
		<input type="radio" id="on" name="notifications" value="on" <?php is_on($profile['notifications'])?>/>
		<label for="on">On</label>
		<input type="radio" id="off" name="notifications" value="off" <?php is_off($profile['notifications'])?>/>
		<label for="off">Off</label><br />

		<input type="submit" name="submit" value="update" />
	</form>
	<script src="js/validatePassword.js"></script>
	<script src="js/validateUsername.js"></script>
</div>