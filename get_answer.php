<?php
// use the seed generated by the question text?

// compute random value between 1 and 64
// FIXME: this is not the right way 

$hexagram_n = rand(1, 64);
echo "The selected hexagram was $hexagram_n<br>";

// choose the file in the right directory
$hexagram_file = "iching/wilhelm/" . sprintf("%02d", $hexagram_n);
echo "chosen file is: $hexagram_file<br>";

$fh = fopen($hexagram_file, 'r');
$text = str_replace( "\n", "<br/>\n", fread($fh, filesize($hexagram_file)));
fclose($fh);

// show the result
echo "Text is:<br> $text";
?>