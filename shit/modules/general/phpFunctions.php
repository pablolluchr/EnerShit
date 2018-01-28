<?

function loadV() {
	// in the form [variablename, arguments + ]
	$a = func_get_args();
	$variable = $a[0];

	switch ($variable) {
		case 'email':
		$username = $a[1];
		return sqlSelectSingle("users","`username` = '$username'","email");

		case 'itemList':
		$username = $a[1];
		return sqlSelect('usersItems','item,amount',"username='$username'",'item');
		default:
		die("variable name ($variable) does not exist");
		break;
	}
}

?>
