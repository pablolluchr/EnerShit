<?

$params = decodeAjaxParam($a[1]);
$username = $params[0];
$email = $params[1];
$password = $params[2];

if (sqlSelect("users","*","`username` = '" . $username . "'", "`username`")) {
	echo "<script>loadP('main','signup','error')</script>";
} else {
	$hash = password_hash($password, PASSWORD_DEFAULT);
	sqlInsert("users", $username, $hash, $email);
	echo "<script>
	saveUsername('" . $username . "');
	savePassword('" . $password . "');
	loadP('main','main');
	</script>";
}

?>