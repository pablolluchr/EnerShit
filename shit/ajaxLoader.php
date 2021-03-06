<?php

//parameters will be split using the first character of the input string

if (isset($_GET["m"])) {
	define('root', '');
	include root . 'init.php';

	databaseConnect();
	
	$module = $_GET["m"];

	// for security
	$includeModules = array("main");
	if (in_array($module, $includeModules)) {
		

		// verify login for pages that are protected
		$username = urldecode($_GET["user"]);
		$password = urldecode($_GET["pass"]);


		if (($username == "null" || $password == "null")) {
			get("login");
			return;
		}

		if (!verifyLogin($username, $password)) {
			// die("wrong login details while loading module: " . $module . ". user: " . $username);
			get("login","error");
			return;
		}
	}

	if (isset($_GET["p"])) {
		$param = urldecode($_GET["p"]);
	} else {
		$param = "";
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