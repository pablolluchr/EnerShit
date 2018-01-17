<?php

databaseConnect();
$rows = 'human, attack, power, intelligence, building';
$query = sqlSelect('energy',$rows,"username='test'","`username`")[0];

?>
<table>
<tr>
<td><?e($query['human'])?></td>
<td><?e($query['attack'])?></td>
<td><?e($query['power'])?></td>
<td><?e($query['intelligence'])?></td>
<td><?e($query['building'])?></td>
</tr>
</table>