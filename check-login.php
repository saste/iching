<?php

$nickname=$_POST['nickname'];
$password=$_POST['password'];

include("db.php");

$sql_connection = mysql_connect($db_hostname, $db_username, $db_password);

$db = mysql_select_db($db_name, $sql_connection);

$query="SELECT * FROM users WHERE nickname='" . mysql_real_escape_string($nickname) . "' AND password='" . mysql_real_escape_string($password) . "'";

$result = mysql_query($query);

if ($result) {
    // convert result to an associative array
    $row = mysql_fetch_assoc($result);
    echo json_encode($row);
} else {
    echo json_encode("{}");
}
?>
