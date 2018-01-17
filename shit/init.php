<?php

$imports = array();

function import($directory) {
	$directory = $directory;
	global $imports;
	if (!file_exists(root . $directory . "/")) {
		die("Import failed: '" . root . $directory . "' does not exist.");
	}
	if (in_array($directory, $imports)) {
		die("Import failed: '" . root . $directory . "' already imported.");
	}
	$imports[] = $directory;
}

function e($string) {
	echo $string;
}

function get() {
	$a = func_get_args();
	$moduleName = $a[0];

	global $imports;

	if (count($imports) == 0) {
		die("No modules imported.");
	}

	foreach ($imports as $modules) {
		$filename = root . $modules . "/" . $moduleName . ".php";
		if (file_exists($filename)) {
			return include ($filename);
		}
	}

	die("Get error: module '" . root . $modules . "/" . $moduleName . "' does not exist");
}

include "config.php";

?>	