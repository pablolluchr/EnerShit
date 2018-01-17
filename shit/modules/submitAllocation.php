<?
$params = decodeAjaxParam($a[1])[0];
$human = $params[0];
$attack = $params[1];
$power = $params[2];
$intel = $params[3];
$human = $params[4];

sqlInsert("resourceAllocation","test", $human, $attack, $power, $intel, $human);

echo "<script>document.getElementById('confirmMessage').innerHTML = 'submitted.';</script>";

?>