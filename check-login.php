<?php

$username=$_POST['username'];
$password=$_POST['password'];

// FIXME: do not hardcode these values
$db_hostname = "localhost";
$db_username = "iching";
$db_password = "iching";

$sql_connection = mysql_connect($db_hostname, $db_username, $db_password);

$db_name = "iching";

$db = mysql_select_db($db_name, $sql_connection);

$query="SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'";

$result = mysql_query($query);

if ($result) {
    echo json_encode($result);
} else {
    echo json_encode("{}");
}
?>
