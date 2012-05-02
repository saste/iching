<?php
$id=$_GET['id'];
$ut=$_GET['ut'];

$nomehost = "localhost";    
$nome = "root";         
$pass = "";   
$connessione = mysql_connect($nomehost,$nome,$pass);
$name_db = "dbamm";
$database=mysql_select_db($name_db,$connessione);
$query="DELETE FROM tblMessaggio WHERE idMe='".$id."'";
$result = mysql_query($query);
if($result)
    header("location: ../homepage.php?id=".$ut);
else
    echo "<script>alert('Messaggio non cancellato.'); history.back();</script>";
?>