<?
$username = decodeAjaxParam($a[1])[0];

if (!$username) {
	return;
}

$result = sqlSelect("users","*","`username` = '" . $username . "'","`username`");
if ($result) {
	echo "<b style='color: red;'>username already exists</b>";
} else {
	echo "<b style='color: green'>username available</b>";
}

?>