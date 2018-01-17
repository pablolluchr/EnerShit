<?
$params = decodeAjaxParam($a[1]);
$human = $params[0];
$attack = $params[1];
$power = $params[2];
$intel = $params[3];
$build = $params[4];

if (!sqlSelect("resourceAllocation","*","`username` = 'test'","`username`")[0]) {
	sqlInsert("resourceAllocation","test", $human, $attack, $power, $intel, $build);
} else {
	sqlUpdate("resourceAllocation","`username` = 'test'","human",$human);
	sqlUpdate("resourceAllocation","`username` = 'test'","power",$power);
	sqlUpdate("resourceAllocation","`username` = 'test'","attack",$attack);
	sqlUpdate("resourceAllocation","`username` = 'test'","intelligence",$intel);
	sqlUpdate("resourceAllocation","`username` = 'test'","building",$build);
}


echo "<script>document.getElementById('submit').style.display = 'none';</script>";

?>