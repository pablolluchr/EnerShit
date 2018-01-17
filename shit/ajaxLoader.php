<?php

//parameters will be split using the first character of the input string

if (isset($_GET["m"])) {
	define('root', '');
	include root . 'init.php';

	databaseConnect();
	
	$module = $_GET["m"];
	$param = urldecode($_GET["p"]);

	if ($param == "") {
		get($module);

	} else {

		if ($module == "") {
			die("ajax load error: module string is empty");	
		}
		get($module, $param);
	}
} else {
	die("ajax load error: module string is empty");
}

?>