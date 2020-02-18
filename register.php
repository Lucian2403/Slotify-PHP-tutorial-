<?php

// Functions for protection and cleaner input fields

function sanitizeFormUsername($inputText) {
    $inputText = strip_tags($inputText); //for protection!
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

function sanitizeFormString($inputText) {
    $inputText = strip_tags($inputText); //for protection!
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));  //transform first letter to uppercase
    return $inputText;
}

function sanitizeFormPassword($inputText) {
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

//    verify if login button is pressed
if(isset($_POST['loginButton'])) {

}

//    verify if register button is pressed
if(isset($_POST['registerButton'])) {
    $username = sanitizeFormUsername($_POST['username']);

    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormUsername($_POST['lastName']);

    $email = sanitizeFormUsername($_POST['email']);
    $email2 = sanitizeFormUsername($_POST['email2']);

    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
</head>
<body>

    <div id="inputContainer">
<!--        LOGIN FORM-->
        <form id="loginForm" action="register.php" method="POST">
            <h2>Login to your account</h2>
            <p>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="Full Name" required>

            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required>
            </p>

            <button type="submit" name="loginButton">LOG IN</button>
        </form>

<!--        REGISTER FORM-->
        <form id="loginForm" action="register.php" method="POST">
            <h2>Create your free account</h2>
            <p>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" name="username" type="text" placeholder="Username" required>

            </p>
            <p>
                <label for="firstName">First Name</label>
                <input id="firstName" name="firstName" type="text" placeholder="First Name" required>

            </p>
            <p>
                <label for="lastName">Last Name</label>
                <input id="lastName" name="lastName" type="text" placeholder="Last Name" required>

            </p>
            <p>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="Email" required>

            </p>
            <p>
                <label for="email2">Confirm Email</label>
                <input id="email2" name="email2" type="email" placeholder="Confirm Email" required>

            </p>
            <p>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" required>
            </p>
            <p>
                <label for="password2">Confirm Password</label>
                <input id="password2" name="password2" type="password" placeholder="Confirm Password" required>
            </p>

            <button type="submit" name="registerButton">SIGN UP</button>
        </form>
    </div>

</body>
</html>

<?php

?>