<?php
$params = decodeAjaxParam($a[1]);
$el1 = $params[0];
$level1 = $params[1];
$el2 = $params[2];
$level2= $params[3];
//SORT SHITS OUT... still messy.
//When shit combines and creates a high level object it just disappears
//needs to implement user as a variable
//doesnt account fo both items being the same one (needs to substract 2 in that case)
databaseConnect();

//get amount of el1
$el1Result = sqlSelect('usersItems','amount',"username='test' and item = '".$el1."' and Level =".$level1,"amount");
$el2Result = sqlSelect('usersItems','amount',"username='test' and item = '".$el2."' and Level =".$level2,"amount");
//this accounts for the case in which you are trying to combine one item with itself but you only have 1
if($el1==$el2&$level1==$level2&$el1Result[0]['amount']==1){
  echo("you dont have enough items!");
  exit;
}
if($el1Result[0]['amount']<1 or $el2Result[0]['amount']<1){
  echo("you dont have enough items!");
  exit;
}
$el1Amount = $el1Result[0]['amount']-1;
sqlUpdate("usersItems", "username='test' and item = '".$el1."' and Level=".$level1,'amount', $el1Amount);
$el2Result = sqlSelect('usersItems','amount',"username='test' and item = '".$el2."' and Level =".$level2,"amount"); //updates el2Result in case el1=el2



//-1 from el2
$el2Amount = $el2Result[0]['amount']-1;
sqlUpdate("usersItems", "username='test' and item = '".$el2."' and Level=".$level2,'amount', $el2Amount);
echo("<script>refreshItems();</script>");
echo($el2amount);
$cols = 'human, attack, power, intelligence, building';
$el1Energies  = sqlSelect('items',$cols,"name = '".$el1."'","name")[0];
$el2Energies  = sqlSelect('items',$cols,"name = '".$el2."'","name")[0];


//in shit, energy values are separated by @
if(substr( $el1, 0, 5 ) === "shit@"){
  $energies = explode("@", $el1);
  $el1Energies=array('human'=>$energies[1],'attack'=>$energies[2],'power'=>$energies[3],'intelligence'=>$energies[4],'building'=>$energies[5]);
}
if(substr( $el2, 0, 5 ) === "shit@"){
  $energies = explode("@", $el2);
  $el2Energies=array('human'=>$energies[1],'attack'=>$energies[2],'power'=>$energies[3],'intelligence'=>$energies[4],'building'=>$energies[5]);
}

//multiplies by level to get energy levels
foreach($el1Energies as &$value){
  $value=$value*$level1;
}
foreach($el2Energies as &$value){
  $value=$value*$level2;
}

$sumEnergies = array($el1Energies['human']+$el2Energies['human'],$el1Energies['attack']+$el2Energies['attack'],
            $el1Energies['power']+$el2Energies['power'],$el1Energies['intelligence']+$el2Energies['intelligence'],
            $el1Energies['building']+$el2Energies['building']);

//returns greatest common divior between two numbers
function gcd($a, $b){
    if ($a == 0 || $b == 0)
        return abs( max(abs($a), abs($b)) );

    $r = $a % $b;
    return ($r != 0) ?
        gcd($b, $r) :
        abs($b);
}

// removes 0s from array as if not the gcd of an item with some energy values 0 will return 0 as gcd
$energiesWithout0s = array();
foreach ($sumEnergies as &$value) {
    if($value!=0){

      array_push($energiesWithout0s,$value);
    }else{

    }
}

// returns gdc of an array of numbers
function gcd_array($array, $a = 0){
    $b = array_pop($array);
    return ($b === null) ?
        (int)$a :
        gcd_array($array, gcd($a, $b));
}
$level=gcd_array($energiesWithout0s);

//calculate ratio of new element gcd as level and energies/gcd as ratio
$ratio=array();

foreach($sumEnergies as &$value){

  array_push($ratio,$value/$level);
}



//checks if the sumRatio belongs to an existing item

$newItem=sqlSelect('items','name',"human = ".$ratio[0]." and attack = ".$ratio[1].
         " and power = ". $ratio[2]." and intelligence = ".$ratio[3].
         " and building = ".$ratio[4],"name")[0]['name'];
//default item if a ratio is not matched which represent the ratios it has
if($newItem==null){ $newItem='shit@'.$ratio[0].'@'.$ratio[1].'@'.$ratio[2].'@'.$ratio[3].'@'.$ratio[4].'@';}

//gets the number of $newItem the user already has.
$newItemResult = sqlSelect('usersItems','amount',"username='test' and item = '".$newItem."' and Level = '".$level."'","amount")[0];
if($newItemResult==null){//if the user has no item of that sort
  sqlInsert("usersItems","test",$newItem,"1",$level);
}
else{ //if the user has at least 0 newItem already (no need to create entry, just +1)
  $newItemAmount = $newItemResult['amount']+1;
  sqlUpdate("usersItems", "username='test' and item = '".$newItem."' and Level = '".$level."'",'amount', $newItemAmount);
}

//consider displaying the result before queries are done instead of waiting for vars to be updated on server
echo("<script>refreshItems();</script>"); //refreshes itemList once queries finished.


?>
