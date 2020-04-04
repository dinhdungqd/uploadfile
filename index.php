<?php
$myfile = "gmail.txt";
$copyfile = "copy.txt";
//$target_dir = "read-text/";
$target_dir = "";
$show = 'show.php';
$checkData = count(file($myfile));
if ($checkData <= 0) {
    include "index.html";
    if (isset($_POST["submit"]) && $_FILES["fileToUpload"]["tmp_name"]) {
        $check = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
        if ($check == 'text/plain') {
            copy($_FILES["fileToUpload"]["tmp_name"], $myfile);
            header("Location: index.php");
        }
    }
} else {
    showEmail($myfile, $copyfile);
}
function showEmail($myfile, $copyfile)
{
    if (file_exists($copyfile)) {
        unlink($copyfile);
    }
    $file = fopen($myfile, "a+") or die("Unable to open file!");
    $copy = fopen($copyfile, "x+") or die("Unable to open file!");
    if (count(file($myfile)) <= 0) {
        header("Location: ");
    } else {
        for ($i = 0; $i < count(file($myfile)); $i++) {
            if ($i == 0) {
                echo fgets($file);
            } else {
                fwrite($copy, fgets($file));
            }
        }
    }
    copy($copyfile, $myfile);
    fclose($copy);
    fclose($file);
}

?>
