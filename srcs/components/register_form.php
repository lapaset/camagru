<?php
    $register_form = '
        <h1>register</h1>
        <div class="form-container">
            <form method="post">
                <label>Username</label><br />
                <input id="username" type="text" name="login"
                        value="'.$_POST['login'].'" /><br />
                <label>Email</label><br />
                <input type="email" name="email"
                        value="'.$_POST['email'].'" /><br />
                <label>Password</label><br />
                <input type="password" id="pw" name="pw" value="" />
				<input type="password" id="confirm_pw" name="confirm_pw" value="" placeholder="repeat password" />

                <input type="submit" value="OK" />
            </form>
        </div>';
?>