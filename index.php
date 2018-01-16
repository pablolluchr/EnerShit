<?php
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

function update() {
    $time = date("his");
    $sql = "INSERT INTO energyTest (human)
    VALUES (time)";

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

$conn->close();
?>
