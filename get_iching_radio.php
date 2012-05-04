<?php

if ($fh = opendir("iching/")) {
    while (false !== ($entry = readdir($fh))) {
        if ($entry != "." and $entry != "..") {
            echo "<input type=\"radio\" name=\"iching_translation\">$entry</input><br/>\n";
        }
    }
    closedir($fh);
}
?>
