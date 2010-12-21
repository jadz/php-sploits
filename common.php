<?php
error_reporting(E_ALL);
session_start();
$links = array(
                'User Filter' => '/index.php?username=jared',
                'Login' => '/login.php', 
                'Send Message' => '/sendmessage.php', 
                'View Messages' => '/messages.php', 
                'Edit Profile' => '/editprofile.php',
		'Load Template' => '/template.php?load=loadme'
          );

if(!empty($_SESSION['authed']) && $_SESSION['authed'] === true) {
    echo 'Logged in as: ' . $_SESSION['username'] . ' [' . $_SESSION['userid']
    . ']<br/><br/>';
}
foreach($links as $title => $link) {
    echo "<a href='" . $link . "'>" . $title . "<a> | ";
}
echo "<br/><hr/>";
