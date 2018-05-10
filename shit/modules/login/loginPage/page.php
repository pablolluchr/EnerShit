<?

function verifyLogin($username, $password) {
	$passwordHash = sqlSelect("users","*","`username` = '" . $username . "'", "`username`")[0]["password"];
	return password_verify($password, $passwordHash);
}

function getErrorMsg($a) {
	if (count($a) == 1) {
        $error = "";
    } else {
        $error = "your login details are wrong";
    }
}

?>

<div class="loginParent">
  <section class="loginChild menuSolid loginContentParent textWhite" id="loginContent">
    <cardhead>
      <h3>Login</h3>
    </cardhead>
    <error class="loginContent" id="error"><?=$error?></error>
    <user1 class="loginContent">Username:</user1>
    <user2 class="loginContent">
      <input class="loginInput textWhite" id="username" type="text"/>
    </user2>
    <pass1 class="loginContent">Password:</pass1>
    <pass2 class="loginContent">
      <input class="loginInput textWhite" id="password" type="password"/>
    </pass2>
    <signup class="loginContent">
      <button class="loginButton textWhite" onclick="document.location.href = '?p=signup'">Signup</button>
    </signup>
    <login class="loginContent">
      <button class="loginButton textWhite" id="login" onclick="login()">Login</button>
    </login>
  </section>
</div>
<script src="functions.js"></script>