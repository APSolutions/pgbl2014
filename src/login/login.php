<?php
date_default_timezone_set('UTC');

echo <<<_END
 <form method="post" name="login" action="src/login/validate_user.php">
    <div class="control-group">
        <input type="text"  name="username" class="username" value="" placeholder="Username" id="login-name" autofocus>
        <label class="login-field-icon fui-user" for="login-name"></label>
    </div>
    <div class="control-group">
        <input type="password" name="pass" class="password" value="" placeholder="Password" id="login-pass">
        <label class="login-field-icon fui-lock" for="login-pass"></label>
    </div>

    <input type="submit" name="login" class="btn btn-primary btn-large btn-block" value="Login">
 </form>
_END;
?>
