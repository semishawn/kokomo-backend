<?php
header("Access-Control-Allow-Origin: *");
ini_set("display_errors", 1); 
error_reporting(E_ALL);

$lolcode = $_REQUEST["lolcode"];
$lolFileName = "script.lol";

$lolFile = fopen($lolFileName, "w");
fwrite($lolFile, $lolcode);
$output = shell_exec("ls -a");
fclose($lolFile);
unlink($lolFileName);

echo $output;
?>