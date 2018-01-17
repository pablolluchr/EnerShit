<?php

// Import any modules here
import("modules");

function phplog($log) {
	echo $log . "<br>";
}

function jslog($log) {
	echo "<script>console.log('" . $log . "');</script>";
}


?>