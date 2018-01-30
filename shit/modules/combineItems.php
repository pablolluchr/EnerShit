<?php
$params = decodeAjaxParam($a[1]);
$el1 = $params[0];
$el2 = $params[1];

//needs to implement user as a variable
//doesnt account fo both items being the same one (needs to substract 2 in that case)
databaseConnect();

//-1 from el1
$el1Result = sqlSelect('usersItems','amount',"username='test' and item = '".$el1."'","amount");
$el1Amount = $el1Result[0]['amount']-1;
sqlUpdate("usersItems", "username='test' and item = '".$el1."'",'amount', $el1Amount);
//-1 from el2
$el2Result = sqlSelect('usersItems','amount',"username='test' and item = '".$el2."'","amount");
$el2Amount = $el2Result[0]['amount']-1;
sqlUpdate("usersItems", "username='test' and item = '".$el2."'",'amount', $el2Amount);


$newItem='shit';
//this item should be gotten by comparing the added ratio to existing items.  if not return shit
$newItemResult = sqlSelect('usersItems','amount',"username='test' and item = '".$newItem."'","amount");


if($newItemResult[0]==null){//if the user has no item of that sort
  sqlInsert("usersItems","test","shit","1");
}
else{ //if the user has at least 0 newItem already (no need to create entry, just +1)
  $newItemAmount = $newItemResult[0]['amount']+1;
  echo($newItemAmount);
  sqlUpdate("usersItems", "username='test' and item = '".$newItem."'",'amount', $newItemAmount);
}

//consider displaying the result before queries are done instead of waiting for vars to be updated on server
echo("<script>refreshItems();</script>"); //refreshes itemList once queries finished.


?>
