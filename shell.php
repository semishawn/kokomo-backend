<?php
header("Access-Control-Allow-Origin: *");
ini_set("display_errors", 1); 
error_reporting(E_ALL);

$code = $_REQUEST["code"];
$extension = $_REQUEST["extension"];
$bin = $_REQUEST["bin"];

$scriptName = "script.{$extension}";
$script = fopen($scriptName, "w");
fwrite($script, $code);

$output = shell_exec("../bin/{$bin} {$scriptName}");

fclose($script);
unlink($scriptName);

echo $output;
?>