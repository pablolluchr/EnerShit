<?

function databaseConnect() {
	$servername = "localhost";
	$username = "noxiveco_enrshit";
	$password = "dQ/X92x^F4H;Si<@";
	$dbname = "noxiveco_enershit";

	// Create connection
	global $conn;
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
}

function sqlSelect($table,$rows,$criteria) {
	global $conn;
	$sql = "SELECT $rows FROM $table WHERE $criteria";
	$result = $conn->query($sql);
	$rows = $result->fetch_assoc();

	if (!result) { // if result failed
		echo "fail";
		die("Select failed: " . $conn->connect_error);
	}
	   return $rows;
}

function sqlInsert() {
	$args = func_get_args();
	$table = $args[0];
	$query = "INSERT INTO `" . $table . "` VALUES (";
	$i = 0;
	// from args 1 to the end of array
	while ($args[++$i]) {
		// if NULL, simply add NULL without quotes
		if ($args[$i] == "NULL") {
			$query = $query . "NULL";
		// if not NULL, add the arg with quotes
		} else {
			$query = $query . "'" . $args[$i] . "'";
		}
		// if a next arg exists, then add a comma
		if ($args[$i + 1]) {
			$query = $query . ", ";
		}
	}
	// after all args, close the bracket
	$query = $query . ")";

	global $conn;
	// if the insert fails, show error message
	if (!($conn->query($query))) {
		die("SQL INSERT Error: " . $query . "<br>" . $conn->error);
	}
}

function sqlDelete($table, $criteria) {
	$query = "DELETE FROM `" . $table . "` WHERE " . $criteria;

	global $conn;
	// if the delete fails, show error message
	if (!($conn->query($query))) {
		die("SQL DELETE Error: " . $query . "<br>" . $conn->error);
	}
}

function sqlUpdate($table, $criteria, $column, $value) {
	$query = "UPDATE `" . $table . "` SET `" . $column . "` = '" . $value . "' WHERE " . $criteria;

	global $conn;
	// if the update fails, show error message
	if (!($conn->query($query))) {
		die("SQL UPDATE Error: " . $query . "<br>" . $conn->error);
	}
}

?>