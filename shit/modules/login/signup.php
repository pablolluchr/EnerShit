<div id="error"></div>
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