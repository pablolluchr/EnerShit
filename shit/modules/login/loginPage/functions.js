document.getElementById("username").focus();

// link the enter button to these input boxes
enterLogin("username");
enterLogin("password");

function login() {
    saveUsername(element("username").value);
    savePassword(element("password").value);
    document.location.href = "?";
}

function enterLogin(id) {
    $("#" + id).keyup(function(event) {
        if (event.keyCode === 13) {
            $("#login").click();
        }
    });
}

function saveUsername(username) {
    localStorage.setItem("enershitUsername", username);
}

function savePassword(password) {
    localStorage.setItem("enershitPassword", password);
}

function getUsername() {
    return localStorage.getItem("enershitUsername");
}

function getPassword() {
    return localStorage.getItem("enershitPassword");
}

function clearLoginDetails() {
    localStorage.removeItem("enershitUsername");
    localStorage.removeItem("enershitPassword");
}

function logout() {
    clearLoginDetails();
    loadP("main","login");
}