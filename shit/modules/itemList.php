<?php

databaseConnect();
$result = sqlSelect('usersItems','item,amount',"username='test'",'item')[0];

//prints items
foreach ($result as &$r) {
    print($r['item'] . "  x" . $r['amount']);
    echo "<br>";
}
>>>>>>> 32d1a19d22b4025f30014460eb67d47cba6fce78

?>
