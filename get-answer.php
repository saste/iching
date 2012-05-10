<?php
$question = $_GET['question'];

$question_date = date('Y-m-d h:i:s a', time());
$hexagram_n = rand(1, 64);

// insert question into DB, *if* the user is registered
if (isset($_GET['userId'])) {
    $userid  = $_GET['userId'];
    include("db.php");

    $sql_connection = mysql_connect($db_hostname, $db_username, $db_password);

    $db = mysql_select_db($db_name, $sql_connection);
    $query = sprintf("INSERT INTO questions (user_id, question, question_date, hexagram_id) VALUES ('%s', '%s', CURRENT_DATE(), %d)",
                     $userid, mysql_real_escape_string($question), $hexagram_n);
    $result = mysql_query($query);
}

// return a json containing question_date and hexagram_n
$res = array ("hexagramId"=>$hexagram_n, "questionDate"=>$question_date);

// get list of supported translations
if ($fh = opendir("iching/")) {
    $translations = array();
    while (false !== ($entry = readdir($fh))) {
        if ($entry != "." and $entry != "..") {
            $translations[] = $entry;
        }
    }
    closedir($fh);
}

$res["translations"] = $translations;
echo json_encode($res);
?>
