<?php

databaseConnect();
$result = sqlSelect('usersItems','item,amount',"username='test'",'item');
print_r($result);

?>
