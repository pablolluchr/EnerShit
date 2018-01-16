<?php

//parameters will be split using the first character of the input string

if (isset($_GET["m"])) {
	define('root', '');
	include root . 'init.php';
	get("database-connection");
	
	$module = $_GET["m"];
	$param = urldecode($_GET["p"]);
	$username = urldecode($_GET["user"]);
	$password = urldecode($_GET["pass"]);

	$excludeModules = array("login","signup","signupAction");

	if (!verifyLogin($username, $password) && !in_array($module, $excludeModules)) {
		die("wrong login details while loading module: " . $module . ". user: " . $username);
	}

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