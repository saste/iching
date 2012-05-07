<?php

// FIXME: do not hardcode these values
$db_hostname = "localhost";
$db_username = "iching";
$db_password = "iching";
$db_name = "iching";

$sql_connection = mysql_connect($db_hostname, $db_username, $db_password);

$db_name = "iching";

$db = mysql_select_db($db_name, $sql_connection);

?>