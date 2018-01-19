<?php
define("root", "");
include (root . "init.php");

databaseConnect();

?>

<head>
	<title>Enershit</title>
	<!-- ajax script needs to be called in headers to be before the actual ajax use -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<link href='css/style.css' type='text/css' rel='stylesheet' media='screen,projection' />
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>
<body>

	<div id="main"></div>
	

	<script type="text/javascript">
		loadP("main","main");
	</script>
</body>