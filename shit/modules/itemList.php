<?php
//displays the items the user have
databaseConnect();
$result = sqlSelect('usersItems','item,amount',"username='test'",'item');

//prints items
foreach ($result as &$r) {
    print($r['item'] ." level ".$r['Level']. "  x" . $r['amount'] );
    echo "<br>";
}

?>
