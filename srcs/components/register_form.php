<?php
    $register_form = '<div class="form-container">
                        <form method="post">
                            <label>Username</label><br />
                            <input id="username" type="text" name="login"
                                    value="'.$_POST['login'].'" required /><br />
                            <label>Email</label><br />
                            <input type="email" name="email"
                                    value="'.$_POST['email'].'" required /><br />
                            <label>Password</label><br />
                            <input type="password" id="pw" name="pw" value="" required />
                            <input type="password" id="confirm_pw" name="confirm_pw" value="" placeholder="repeat password" required />

                            <input type="submit" value="OK" />
                        </form>
                    </div>
                    <script src="js/validateUsername.js"></script>
                    <script src="js/validatePassword.js"></script>';
?>