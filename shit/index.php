<?php
define("root", "");
include (root . "init.php");

databaseConnect();

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

<table>
	<tr id="energies">
		
	</tr>
	<tr>
		<td><input oninput="doneAllocation()" type="text" id="human"></td>
		<td><input oninput="doneAllocation()" type="text" id="attack"></td>
		<td><input oninput="doneAllocation()" type="text" id="power"></td>
		<td><input oninput="doneAllocation()" type="text" id="intel"></td>
		<td><input oninput="doneAllocation()" type="text" id="build"></td>
	</tr>
</table>
<button id="submit" style="display: none;">DONE</button>

<script type="text/javascript">
	function doneAllocation() {
		document.getElementById("submit").style.display = "block";
	}
</script>