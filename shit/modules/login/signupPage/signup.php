<?
if (count($a) == 2) {
	$error = decodeAjaxParam($a[1])[0];
	if ($error = "error") {
		$error = "Username already exists";
	} else {
		$error = "";
	}
}

?>

<div class="loginParent">
	<div class="loginChild menuSolid textWhite signupContentParent" id="signupContent">
		<cardhead><h3>Sign Up</h3></cardhead>
		<error id="error" class="loginContent"><em><?e($error)?></em></error>
		<user1 class="loginContent">
			Username:
		</user1>
		<user2 class="loginContent">
			<input class="loginInput textWhite" type="text" id="username" oninput="loadP('error','checkUserExists',element('username').value)">
		</user2>
		<email1 class="loginContent">
			Email:
		</email1>
		<email2 class="loginContent">
			<input class="loginInput textWhite" type="email" id="email">
		</email2>
		<pass1 class="loginContent">
			Password:
		</pass1>
		<pass2 class="loginContent">
			<input class="loginInput textWhite" type="password" id="password">
		</pass2>
		<login class="loginContent">
			<button class="loginButton textWhite" onclick="document.location.href = '?p=login'">back to login</button>
		</login>
		<signup class="loginContent">
			<button class="loginButton textWhite" onclick="signup()" id="signup">Signup</button>
		</signup>
	</div>
</div>

<script type="text/javascript">
	document.getElementById("username").focus();

	function signup() {
		var username = element("username").value;
		var email = element("email").value;
		var password = element("password").value;

		if (!username || !email || !password) {
			element("error").innerHTML = "Please enter all details";
			return;
		}

		loadP('ghost','signupAction', username, email, password);
	}

	function enterSingup(id) {
		$("#" + id).keyup(function(event) {
			if (event.keyCode === 13) {
				$("#signup").click();
			}
		});
	}
	enterSingup("username");
	enterSingup("email");
	enterSingup("password");
</script>

<div id="ghost"></div>