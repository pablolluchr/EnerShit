<?

function databaseConnect() {
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
}

function sqlSelect($table,$criteria,$rows) {
	global $conn;
	$sql = "SELECT $table FROM $rows WHERE $criteria";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		return $result;
	} else {
	    echo "0 results";
	}
}

?>
