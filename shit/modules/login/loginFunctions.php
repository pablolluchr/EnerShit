<?

function verifyLogin($username, $password) {
	$passwordHash = sqlSelect("users","*","`username` = '" . $username . "'", "`username`")[0]["password"];
	return password_verify($password, $passwordHash);
}

?>

<script type="text/javascript">

	function saveUsername(username) {
		localStorage.setItem("enershitUsername", username);
	}

	function savePassword(password) {
		localStorage.setItem("enershitPassword", password);
	}

	function getUsername() {
		return localStorage.getItem("enershitUsername");
	}

	function getPassword() {
		return localStorage.getItem("enershitPassword");
	}

	function clearLoginDetails() {
		localStorage.removeItem("enershitUsername");
		localStorage.removeItem("enershitPassword");
	}

	function logout() {
		clearLoginDetails();
		loadP("main","login");
	}
</script>