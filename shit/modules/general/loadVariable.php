<?

$params = decodeAjaxParam($a[1]);

// params is [variablename, arguments + ]
echo call_user_func_array("loadV", $params);

?>