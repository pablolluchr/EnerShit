<?php
define("root", "");
include (root . "init.php");

databaseConnect();
sqlInsert("queryTest","5","6");

// $servername = "localhost";
// $username = "noxiveco_enrshit";
// $password = "dQ/X92x^F4H;Si<@";
// $dbname = "noxiveco_enershit";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }



?>