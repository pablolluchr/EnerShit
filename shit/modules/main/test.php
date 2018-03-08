<?
//$test = decodeAjaxParam($a[1])[0];
global $test;
$test='test';
var_dump($test);
function dummy(){
  global $test;
  var_dump($test);
}
dummy();

?>
