<?php
$ut=$_GET['ut'];
$testoMe=$_POST['testoMe'];
$dataMe=date('Y-m-d');
$nomehost = "localhost";    
$nome = "root";         
$pass = "";   
$connessione = mysql_connect($nomehost,$nome,$pass);
$name_db = "dbamm";
$database=mysql_select_db($name_db,$connessione);
echo $query="INSERT INTO tblMessaggio (idUt, testoMe, dataMe) VALUES ($ut, '$testoMe', '$dataMe');";
$result = mysql_query($query);
if($result)
    header("location: ../homepage.php?id=".$ut);
else
    echo "<script>alert('Messaggio non cancellato.'); history.back();</script>";
?>