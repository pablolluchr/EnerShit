<?
if (count($a) == 1) {
	$error = "";
} else {
	$error = "your login details are wrong";
}

echo "<script>clearLoginDetails();</script>";

?>

<div class="loginParent">
	<section class="loginChild menuSolid loginContentParent textWhite" id="loginContent">
		<cardhead><h3>Login</h3></cardhead>
		<error class="loginContent" id="error"><?e($error)?></error>
		<user1 class="loginContent">Username:</user1>
		<user2 class="loginContent">
			<input class="loginInput textWhite" type="text" id="username">
		</user2>
		<pass1 class="loginContent">Password:</pass1>
		<pass2 class="loginContent">
			<input class="loginInput textWhite" type="password" id="password">
		</pass2>
		<signup class="loginContent">
			<button class="loginButton textWhite" onclick="document.location.href = '?p=signup'">Signup</button>
		</signup>
		<login class="loginContent">
			<button id="login" class="loginButton textWhite" onclick="login()">Login</button>
		</login>
	</section>
</div>

<script type="text/javascript">

	function login() {
		saveUsername(element("username").value);
		savePassword(element("password").value);
		document.location.href = "?";
	}

	document.getElementById("username").focus();

	function enterLogin(id) {
		$("#" + id).keyup(function(event) {
			if (event.keyCode === 13) {
				$("#login").click();
			}
		});
	}
	enterLogin("username");
	enterLogin("password");
</script>