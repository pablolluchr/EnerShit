<?

$resourceAlloc = sqlSelect("resourceAllocation","*","`username` = 'test'","`username`")[0];
if (!$resourceAlloc) {
	$humanAlloc = "0";
	$powerAlloc = "0";
	$attackAlloc = "0";
	$intelAlloc = "0";
	$buildAlloc = "0";
} else {
	$humanAlloc = $resourceAlloc["human"];
	$powerAlloc = $resourceAlloc["power"];
	$attackAlloc = $resourceAlloc["attack"];
	$intelAlloc = $resourceAlloc["intelligence"];
	$buildAlloc = $resourceAlloc["building"];
}



?>



<table>
	<div id="energies">
	</div>
	<tr>
		<td><input oninput="doneAllocation()" type="number" value="<?e($humanAlloc)?>" id="human"></td>
		<td><input oninput="doneAllocation()" type="number" value="<?e($attackAlloc)?>" id="attack"></td>
		<td><input oninput="doneAllocation()" type="number" value="<?e($powerAlloc)?>" id="power"></td>
		<td><input oninput="doneAllocation()" type="number" value="<?e($intelAlloc)?>" id="intel"></td>
		<td><input oninput="doneAllocation()" type="number" value="<?e($buildAlloc)?>" id="build"></td>
	</tr>
</table>
<button onclick="submitAllocation()" id="submit" style="display: none;">DONE</button>
<div id="confirmMessage"></div>

<ul id="itemList">
</ul>


<!-- ajax script is called in headers to be before the actual ajax use -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
<script type="text/javascript">
	function doneAllocation() {
		document.getElementById("submit").style.display = "block";
	}

	function submitAllocation() {
		document.getElementById("submit").innerHTML = "submitting...";

		var human = document.getElementById("human").value;
		var attack = document.getElementById("attack").value;
		var power = document.getElementById("power").value;
		var intel = document.getElementById("intel").value;
		var build = document.getElementById("build").value;

		if (!human) {human = "0";}
		if (!attack) {attack = "0";}
		if (!power) {power = "0";}
		if (!intel) {intel = "0";}
		if (!build) {build = "0";}
		loadP("ghost","submitAllocation", human, attack, power, intel, build);
	}

  //loop that refreshes energy display and items list
  var t=setInterval(updateEnergy,1000);
  function updateEnergy(){
  	loadP("energies","energy");
  	loadP("itemList","itemList");
  }



</script>

<div id="ghost"></div>
