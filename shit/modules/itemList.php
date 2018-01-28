<?php

databaseConnect();
$result = sqlSelect('usersItems','item,amount',"username='test'",'item');

//prints items
foreach ($result as &$r) {
    print($r['item'] . "  x" . $r['amount']);
    echo "<br>";
}

?>
