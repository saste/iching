<?php

$hexagram_id = $_GET['hexagramId'];
$translation = $_GET['translation'];

// choose the file in the right directory
$hexagram_file = sprintf("iching/%s/%02d", $translation, $hexagram_id);

$fh = fopen($hexagram_file, 'r');
$text = str_replace( "\n", "<br>\n", fread($fh, filesize($hexagram_file)));
fclose($fh);

echo "$text";
?>