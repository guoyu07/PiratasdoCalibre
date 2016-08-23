<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

$patch = "../article/";
$index = "index.php";
$nomePost = "teste-pasta";

mkdir("../article/".$nomePost."/");

$file = $patch.$nomePost."/".$index;
$mode = "a";

$file = fopen($file, $mode);

$text = "Hello, world!";

fwrite($file, $text);
fclose($file);

echo $file;

?>