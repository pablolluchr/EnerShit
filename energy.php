<?php

databaseConnect();
$rows = "'human','attack','power','intelligence','building'";
$query = sqlSelect('energy',$rows,'username=test')
print_r($query);
?>
