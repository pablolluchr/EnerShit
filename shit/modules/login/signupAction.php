<?

$params = decodeAjaxParam($a[1]);
$username = $params[0];
$email = $params[1];
$password = $params[2];

$hash = password_hash($password, PASSWORD_DEFAULT);

sqlInsert("users", $username, $hash, $email);

echo "<script>loadP('main','main')</script>";

?>