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

<div id="error"><?e($error)?></div>
<br>
Username:
<input type="text" id="username">
<br>
Email:
<input type="email" id="email">
<br>
Password:
<input type="password" id="password">
<br>
<button onclick="signup()">Signup</button>
<br>
<br>
<a onclick="loadP('main','login')">back to login</a>

<script type="text/javascript">
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
</script>

<div id="ghost"></div>