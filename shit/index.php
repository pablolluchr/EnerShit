<?php
define("root", "");
include (root . "init.php");

databaseConnect();

// using GET to navigate login and signup so that you can use the back button on chrome or phone
$page = $_GET["p"];
if (!$page) {
	$page = "main";
}
?>

<head>
	<title>Enershit</title>
	<!-- ajax script needs to be called in headers to be before the actual ajax use -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<link href='css/style.css?v=<?e(time())?>' type='text/css' rel='stylesheet' media='screen,projection' />
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>
<body>

	<div id="main"></div>
	

	<script type="text/javascript">
		loadP("main","<?e($page)?>");
	</script>
</body>