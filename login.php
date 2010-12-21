<?php
require_once 'common.php';
require_once 'dbfuncs.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!empty($_REQUEST['username']) && !empty($_REQUEST['password'])) {
        $authSQL = "select * from users where username = '" . $_REQUEST['username'] .
           "' and password = '" . $_REQUEST['password'] . "'"; 
        $authed = getSelect($authSQL);

        if(!$authed) {
            echo 'Invalid login.<br>';
            echo 'SQL Used: ' . $authSQL;
            die;
        }
        else {
            echo 'Success, you authed! <br>';
            echo 'SQL Used: ' . $authSQL;
            $_SESSION['authed'] = true;
            $_SESSION['userid'] = $authed[0][0];
            $_SESSION['username'] = $authed[0][1];
        }
    }
}
else {
?>
<form method="POST">
    <label for="username">username:</label>
    <input name="username" id="username" /> <br />
    <label for="password">password:</label>
    <input name="password" id="password" /> <br />
    <input type="submit" value="Login!">
</form>
<?
}
