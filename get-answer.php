<?php
$question    = $_POST['question'];
$translation = $_POST['translation'];
$userid      = $_POST['userId'];

echo "Question is: " . $question . "<br>";

echo "Question asked on date: " . date('Y-m-d h:i:s a', time()) . "<br>";

$hexagram_n = rand(1, 64);
echo "The selected hexagram number was $hexagram_n<br>";

// choose the file in the right directory
$hexagram_file = "iching/wilhelm/" . sprintf("%02d", $hexagram_n);
echo "chosen file is: $hexagram_file<br>";

$fh = fopen($hexagram_file, 'r');
$text = str_replace( "\n", "<br>\n", fread($fh, filesize($hexagram_file)));
fclose($fh);

// insert question into DB, *if* the user is registered
if ($userid) {
    include("db.php");

    $sql_connection = mysql_connect($db_hostname, $db_username, $db_password);

    $db = mysql_select_db($db_name, $sql_connection);
    $query = sprintf("INSERT INTO questions (user_id, question, question_date, hexagram_id) VALUES ('%s', '%s', CURRENT_DATE())",
                     $userid, mysql_real_escape_string($question), $hexagram_n);
    $result = mysql_query($query);
}

// show the answer text
echo "Text is:<br> $text";
?>