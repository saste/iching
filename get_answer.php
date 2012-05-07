<?php
$question = $_POST['question'];
$translation = $_POST['translation'];
$userid = $_POST['userid'];

echo "Question is: " . $question . "<br>";

echo "Question asked on date: " . date('Y-m-d h:i:s a', time()) . "<br>";

$hexagram_n = rand(1, 64);
echo "The selected hexagram number was $hexagram_n<br>";

// choose the file in the right directory
$hexagram_file = "iching/wilhelm/" . sprintf("%02d", $hexagram_n);
echo "chosen file is: $hexagram_file<br>";

$fh = fopen($hexagram_file, 'r');
$text = str_replace( "\n", "<br/>\n", fread($fh, filesize($hexagram_file)));
fclose($fh);

// insert question into DB, *if* the user is registered
if ($userid) {
    include("db.php");

    $sql_connection = mysql_connect($db_hostname, $db_username, $db_password);

    $db = mysql_select_db($db_name, $sql_connection);
    $query="INSERT * INTO questions (user_id, question, question_date) values (" .
        $userid . ", " . mysql_real_escape_string($question) . ",  CURRENT_DATE());";

    echo $query;
    $result = mysql_query($query);
}


// show the answer text
echo "Text is:<br> $text";
?>