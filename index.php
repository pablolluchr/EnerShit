<?php
define("root", "");
include (root . "init.php");

databaseConnect();

$query = sqlSelect("queryTest","colA","colA=5");

echo $query["colA"];
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


<!-- ajax script is called in headers to be before the actual ajax use -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div id="test"></div>
<script type="text/javascript">
  loadP("test","test","hello world");
</script>
