<?php
$myfile = "gmail.txt";
$copy = fopen($myfile, "w+") or die("Unable to open file!");
fclose($copy);
header("Location: index.php");
