<?

function verifyLogin($username, $password) {
	$passwordHash = sqlSelect("users","*","`username` = '" . $username . "'", "`username`")[0]["password"];
	return password_verify($password, $passwordHash);
}

function getErrorMsg($a) {
	if (count($a) == 1) {
        $error = "";
    } else {
        $error = "your login details are wrong";
    }
}

?>
