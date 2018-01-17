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
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>


<table>
	<tr id="energies">

	</tr>
	<tr>
		<td><input oninput="doneAllocation()" type="number" value="0" id="human"></td>
		<td><input oninput="doneAllocation()" type="number" value="0" id="attack"></td>
		<td><input oninput="doneAllocation()" type="number" value="0" id="power"></td>
		<td><input oninput="doneAllocation()" type="number" value="0" id="intel"></td>
		<td><input oninput="doneAllocation()" type="number" value="0" id="build"></td>
	</tr>
</table>
<button onclick="submitAllocation()" id="submit" style="display: none;">DONE</button>
<div id="confirmMessage"></div>

<table>
  
</table>

<script type="text/javascript">
	function doneAllocation() {
		document.getElementById("submit").style.display = "block";
	}
<<<<<<< HEAD
</script>
=======

	function submitAllocation() {
		var human = document.getElementById("human").value;
		var attack = document.getElementById("attack").value;
		var power = document.getElementById("power").value;
		var intel = document.getElementById("intel").value;
		var build = document.getElementById("build").value;
		loadP("ghost","submitAllocation", human, attack, power, intel, build);
	}
</script>

<div id="ghost"></div>
>>>>>>> 94c7291a03590d9e945efcdb4a3fef76e8edf9c3
