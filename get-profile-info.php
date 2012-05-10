<?php

$userid=$_GET['userid'];

include("db.php");

$sql_connection = mysql_connect($db_hostname, $db_username, $db_password);

$db = mysql_select_db($db_name, $sql_connection);

$res = array();

$query = sprintf("SELECT * FROM users WHERE id='%s';", mysql_real_escape_string($userid));
$result = mysql_query($query);
$res["user"] = mysql_fetch_assoc($result);

$query = sprintf("SELECT * FROM questions WHERE user_id='%s'", $userid);
$result = mysql_query($query);

$questions;
while ($row = mysql_fetch_assoc($result)) {
    $questions[] = $row;
}

$res["questions"] = $questions;

echo json_encode($res);
?>
