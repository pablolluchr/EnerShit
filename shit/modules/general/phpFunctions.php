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
		$result = sqlSelect('usersItems','item,amount',"username='$username'",'item');

		//IT NEEDS TO ACCOUNT FOR WHEN ITEMS HAVENT BEEN SELECTED
		echo("

		<script> var items = ".json_encode($result, JSON_PRETTY_PRINT).";
		//creates a button for each item so when they are clicked the item is added to the combining queue
		document.getElementById('items').innerHTML = '';
		for (var i = 0; i < items.length; i++) {
			if(items[i].amount!=0){
		    var button = document.createElement(\"button\");
		    button.id=items[i].item; //creates button with id of item to be combined
		    button.innerHTML = (items[i].item).concat(\" x\".concat(items[i].amount));
		    // 2. Append somewhere
		    var body = document.getElementsByTagName(\"items\")[0];
		    body.appendChild(button);
		    // 3. Add event handler
		    button.addEventListener('click', function(){
		    addToCombine(this.id);
		    });
			}
	  }
		</script>");
		default:
		die("variable name ($variable) does not exist");
		break;
	}
}

?>
