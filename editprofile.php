<?php
require_once 'common.php';
require_once 'dbfuncs.php';

if(!empty($_SESSION['authed']) && $_SESSION['authed'] === true) {
    if(!empty($_SESSION['userid'])) {

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if(!empty($_REQUEST['firstname']) && !empty($_REQUEST['surname'])
                && !empty($_REQUEST['email'])) {

                $updateSQL = "update users set firstname = '" . $_REQUEST['firstname']
                            . "', surname = '" . $_REQUEST['surname'] . "', email='" .
                            $_REQUEST['email'] . "' where id = " .  $_SESSION['userid'];

                $updated = insertQuery($updateSQL, true);
                if($updated === false) {
                    echo 'Unable to update your profile.';
                }
                else {
                    echo 'Details updated! Excellent.';
                }
            }
        }
        else {
            $userSQL  = "select email, firstname, surname from users where id = " .  $_SESSION['userid'];
            $userList = getSelect($userSQL);

            if(empty($userList) && is_array($userList)) {
                die('Unable to retrieve your settings. Doh!');
            }
            $user = $userList[0];
        ?>
        <form method="POST">
            <p>Edit your settings</p>
            <label for="firstname">Firstname:</label>
            <input name="firstname" id="firstname" value="<?=$user[1]?>" /> <br />
            <label for="surname">Surname:</label>
            <input name="surname" id="surname" value="<?=$user[2]?>" /> <br />
            <label for="email">Email:</label>
            <input name="email" id="email" value="<?=$user[0]?>" /> <br />
            <input type="submit" value="Update profile">
        </form>
        <?
        }
    }
}
