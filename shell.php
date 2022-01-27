<?php
header("Access-Control-Allow-Origin: *");
ini_set("display_errors", 1); 
error_reporting(E_ALL);

$code = $_REQUEST["code"];
$extension = $_REQUEST["extension"];
$bin = $_REQUEST["bin"];
$options = $_REQUEST["options"];

$scriptName = "script.{$extension}";
$script = fopen($scriptName, "w");
fwrite($script, $code);

$output = shell_exec("timeout 10 bin/{$bin} {$options} {$scriptName}");

fclose($script);
unlink($scriptName);

echo $output;
?>