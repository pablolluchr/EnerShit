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

<html>
<head>
	<style>

	.grid-container {
		display: grid;
		grid-template-columns: 200px 1fr 100px 1fr 200px;
		height:100%;
		width: 100%;
		background-image: url(modules/images/mountain_dark.svg);
		background-repeat: no-repeat;
		background-size: 200% 300%;
		background-position: calc(50% + 50px) 44%;
		grid-template-rows: 100px  1fr  50px;

	}
	body{
		color: white;
		margin:0;
	}
	.grid-container > div {

		text-align: center;
		border-style: solid;
		font-size: 30px;
	}
	.item1{
		border-width: 0px;
		grid-area: 1 / 1 / 2 / 6;
		/* row column row colum */
	}
	.notification_box{
		border-width: 4px;
		border-radius:10px;
		background-color: rgba(255, 255, 255, 0.6);
		display:inline-block;
		height:calc(82vh - 100px);
		width:80%;
	}


	.userLevel{
		grid-area: 1 / 3 / 2 / 4;
		border-width: 4px;
		border-radius:100%;
		background:url("modules/images/level.png") center no-repeat;
		background-size: 100% 100%;
	}
	.item2{
		border-width: 0px;
		grid-area: 2 / 1 / 3 / 2;
		background-color: rgba(0, 0, 0, 0);
		justify-self: center;
	}
	.item3{
		border-width: 0px;
		grid-area: 2 / 2 / 3 / 5;
	}
	.item4{
		border-width: 0px;
		grid-area: 2 / 5 / 3 / 6;
		background-color: rgba(0, 0, 0, 0.0);
	}

	.item5{
		border-width: 0px;
		grid-area: 3 / 1 / 4 / 6;
		background-color: rgba(0, 0, 0, 0.8);

	}
	#combine{
		display:none;
	}
	#ghost{
		display:none
	}

	/* hide side menus on phones */
	@media screen and (max-width: 480px) {
			.grid-container {
				grid-template-columns: 0px auto 0px;
			}
			.item2{
				display: none;
			}
			.item4{
				display: none;
			}
	}

	</style>

	 <!-- <link rel="stylesheet" type="text/css" href="mainStyle.css"> -->
</head>
<body>

<div class="grid-container">
  <div class="item1"></div>
	<div class="userLevel"></div>
  <div class="item2">
		<div> notifications </div>
		<?php include('test.php') ?>
		<div class="notification_box"></div>
	</div>
  <div class="item3">
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

    <div id="itemList"></div>
    <items id="items"></items>
    <div id="testItems"></div>
    <button id="combine" onclick="combineItems()">Combine items</button>
		<div id="errorItems"></div>
  </div>
  <div class="item4">
		<div>analytics</div>
		<div class="notification_box"></div>
	</div>

  <div class="item5">
    <a onclick="logout()">logout</a>
		<div id="ghost"></div>

  </div>
</div>



</body>
</html>

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
  }

  //code to load items
  var items = null;
  function refreshItems(){
		loadV("ghost","itemList","test")
    //store items in var items
  }
  refreshItems();

  //vars that stores the elements to combine
  var el1, el2 = null;
	var level1, level2 = null;
  var nextEl = "el1"; //stores the last el updated

  function addToCombine(id) { //FIFO using el1 and el2 to store combination of elemnt
		//id: name and level separated by *
		var split = id.split('*');
		var name = split[0];
		var level = split[1];
    if(nextEl=="el1"){
      el1=name;
			level1=level;
      nextEl="el2";
    }
    else if(nextEl=="el2"){
      el2=name;
			level2=level;
      nextEl="el1";
    }
		var combine = document.getElementById('combine');
		combine.style.display = 'none';
		if(el2!=null){
			combine.style.display = 'block';
		}
    //displays the two elements that will be combined
    document.getElementById("testItems").innerHTML = el1.concat(" will be combined with ").concat(el2);
  }



  //combines el1 and el2 to create a new item
  function combineItems(){
    loadP("errorItems","combineItems",el1,level1,el2,level2);
  }

</script>
<div id="updateItems"> </div>
