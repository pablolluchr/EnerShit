<?
if (count($a) == 1) {
	$error = "";
} else {
	$error = "your login details are wrong";
}

echo $error;
echo "<script>clearLoginDetails();</script>";

?>

<div class="loginParent">
	<div class="loginChild menuSolid">
		<div class="loginUsername">
			Username:<br>
			<input type="text" id="username">
		</div>
		<br>
		Password:<br>
		<input type="password" id="password">
		<br>
		<button onclick="login()">Login</button>
		<br>
		<br>
		<a onclick="loadP('main', 'signup')">signup</a>
	</div>
</div>

<script type="text/javascript">
	function login() {
		saveUsername(element("username").value);
		savePassword(element("password").value);
		loadP("main","main");
	}

</script>