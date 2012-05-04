<?php
$username=$_POST['user'];
$password=$_POST['pass'];
$nomehost = "localhost";
$nome = "root";
$pass = "";
$connessione = mysql_connect($nomehost,$nome,$pass);
$name_db = "iching";
$database=mysql_select_db($name_db,$connessione);
$query="SELECT * FROM tblUtente WHERE userUt='".$username."' AND passUt='".$password."'";
$result = mysql_query($query);
if($result)
    if ($num_rows = mysql_num_rows($result)>0) {
        $row = mysql_fetch_array($result);
        header("location: ../homepage.php?id=".$row[0]);
    } else
        echo "<script>alert('Ti è andata male! Riprova!'); history.back();</script>";
?>