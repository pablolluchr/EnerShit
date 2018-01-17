<?php

databaseConnect();
$result = sqlSelect('usersItems','item,amount',"username='test'",'item')[0];
print_r($result);

?>
