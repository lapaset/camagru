<?php
    $register_form = '
        <h1>register</h1>
        <div class="form-container">
            <form method="post">
                Username<br />
                <input id="username" type="text" name="login"
                        value="'.$_POST['login'].'" /><br />
                Email<br />
                <input type="email" name="email"
                        value="'.$_POST['email'].'" /><br />
                Password
                <input type="password" id="pw" name="pw" value="" placeholder="new password" />
				<input type="password" id="confirm_pw" name="confirm_pw" value="" placeholder="new password again" />

                <input type="submit" value="OK" />
            </form>
        </div>';
?>