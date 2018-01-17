
<?php

//define("root", "");
//include (root . "init.php");


$servername = "localhost";
$username = "noxiveco_enrshit";
$password = "dQ/X92x^F4H;Si<@";
$dbname = "noxiveco_enershit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function update(){
  $sql = "INSERT INTO energy (human)
  VALUES (123)";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

for ($i=0; $i < 59; $i++) {
  update();
  sleep(1);
}






/*
databaseConnect();

$allocation=sqlSelect('resourceAllocation','*',"username='test'",'username');
$currentEnergy=sqlSelect('energy','*',"username='test'",'username');

//updates each row in the energy table by adding the current energy and the allocation
sqlUpdate('energy',"username='test'",'human',($allocation['human']+$currentEnergy['human']));
function update() {
    $allocation=sqlSelect('resourceAllocation','*',"username='test'",'username');
    $currentEnergy=sqlSelect('energy','*',"username='test'",'username');

    //updates each row in the energy table by adding the current energy and the allocation
    sqlUpdate('energy',"username='test'",'human',($allocation['human']+$currentEnergy['human']));

}
for ($i=0; $i < 59; $i++) {
  update();
  sleep(1);
}
*/
$conn->close();
?>
