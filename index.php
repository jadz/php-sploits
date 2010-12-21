<?php
require_once 'common.php';
require_once 'dbfuncs.php';

$getUser = $_REQUEST["username"];
$getId    = $_REQUEST["id"];

// ' UNION SELECT 1,1,1,1,LOAD_FILE('/etc/passwd'),'1

if(!empty($getUser)) {
	$query   = "select * from users where username = '" . $getUser . "'";
	$results = getSelect($query);
}
elseif(!empty($getId)) {
	$query   = "select * from users where id = " . $getId;
	$results = getSelect($query);
}

echo $query . "<br>";

if(!$results) {
    echo "Unable to find users: " . $_GET["username"];
}
else {
    foreach($results as $row) {
        echo "User found: <br>";
        echo "<b>Id:</b> " . $row[0] . "<br>";
        echo "<b>Username: </b>" . $row[1] . "<br>";
        echo "<b>Password: </b>" . $row[2] . "<br>";
        echo "<b>Firstname: </b>" . $row[3] . "<br>";
        echo "<b>Lastname: </b>" . $row[4] . "<br>";
        echo "<b>Email: </b>" . $row[5] . "<br>";
    }
}
