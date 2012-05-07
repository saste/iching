<?php

$username=$_POST['username'];
$password=$_POST['password'];

// FIXME: do not hardcode these values
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";

$sql_connection = mysql_connect($db_hostname, $db_username, $db_password);

$db_name = "iching";

$db = mysql_select_db($db_name, $sql_connection);

$query="SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'";

$result = mysql_query($query);

if ($result)
    if ($num_rows = mysql_num_rows($result)>0) {
        $row = mysql_fetch_array($result);
        header("location: ../homepage.php?id=".$row[0]);
    } else
        echo "<script>alert('Ti è andata male! Riprova!'); history.back();</script>";
?>