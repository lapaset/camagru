<?php
    $create_form = '
        <h1>register</h1>
        <div class="form-container">
            <form method="post">
                Username<br />
                <input type="text" name="login"
                        value="'.$_POST['login'].'" /><br />
                Email<br />
                <input type="email" name="email"
                        value="'.$_POST['email'].'" /><br />
                Password
                <input type="password" name="pw" /><br />
                <input type="submit" value="OK" />
            </form>
        </div>';
?>