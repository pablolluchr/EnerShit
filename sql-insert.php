<?
// a[1] = table
// a[2+] = values
// INSERT INTO `transactions` VALUES (NULL, 'actor', 'receiver', '10', 'action', '1319841', 'comment')
$insertString = "INSERT INTO `" . $a[1] . "` VALUES (";
$pos = 1;
while ($a[++$pos]) {
	if ($a[$pos] == "NULL") {
		$insertString = $insertString . "NULL";
	} else {
		$insertString = $insertString . "'" . $a[$pos] . "'";
	}
	if ($a[$pos + 1]) {
		$insertString = $insertString . ", ";
	}
}
$insertString = $insertString . ")";
if (!mysql_query($insertString)) {
	die("error in sql-insert.php: " . mysql_error());
}
?>