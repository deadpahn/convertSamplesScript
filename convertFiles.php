<?php
#set conversion folders
$workingFolder = "./DSCONVERT";
$convertedFolder = "./CONVERTED";
$bit = 8;
$rate = 32000;

#get file list
exec("find {$workingFolder} -name '*.wav' > file.list");
$files = file_get_contents("file.list");
$arrFiles = explode("\n", $files);

foreach($arrFiles as $file)
{
	$expFile = explode('/', $file);

	$fileName = end($expFile);

	$convertedPath = str_replace($fileName, '', $file);

	$convertedPath = str_replace($workingFolder , $convertedFolder, $convertedPath);

	$convertedPath = strtoupper($convertedPath);

	$finalDest = strtoupper($convertedPath) . strtoupper($fileName);

	exec("mkdir -p {$convertedPath};");

	$soxString = "sox \"{$file}\" -r \"{$rate}\" -b \"{$bit}\" -c 1 \"{$finalDest}\" norm;";

	exec($soxString);
}
?>
