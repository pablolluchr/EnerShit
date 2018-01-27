<?php

// Import any modules here
import("modules");
import("modules/main");
import("modules/login");
import("modules/general");

function phplog($log) {
	echo $log . "<br>";
}

function jslog($log) {
	echo "<script>console.log('" . $log . "');</script>";
}


get("databaseFunctions");
get("jsFunctions");
get("loginFunctions");
get("ajaxFunctions");
get("phpFunctions");

?>