<?php

include ("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

//create variable "account" so we can use register and login handlers
$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

//Function that remember the value entered into inputs
function getInputValid($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
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
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
<!--    JQUERY HOST-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>
    <?php
//    Showing only the relevant form when data is submitted
    if(isset($_POST['registerButton'])) {
        echo
        '<script>
            $(document).ready(function() {
                $("#loginForm").hide();
                $("#registerForm").show();
            });
        </script>';
    }
    else {
        echo
        '<script>
            $(document).ready(function() {
                $("#loginForm").show();
                $("#registerForm").hide();
            });
        </script>';
    }
    ?>

    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <!--        LOGIN FORM-->
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed);?>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="Full Name" required>

                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required>
                    </p>

                    <button type="submit" name="loginButton">LOG IN</button>

                    <div class="hasAccountText">
                            <span id="hideLogin">Don't have an account yet? Sign up here.</span>
                    </div>
                </form>


                <!--        REGISTER FORM-->
                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create your free account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters);
                        echo $account->getError(Constants::$usernameTaken) ?>
                        <label for="registerUsername">Username</label>
                        <input id="registerUsername" name="username" type="text" placeholder="Username" value="<?php getInputValid('username'); ?>" required>

                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$firstNameCharacters) ?>
                        <label for="firstName">First Name</label>
                        <input id="firstName" name="firstName" type="text" placeholder="First Name" value="<?php getInputValid('firstName'); ?>" required>

                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$lastNameCharacters) ?>
                        <label for="lastName">Last Name</label>
                        <input id="lastName" name="lastName" type="text" placeholder="Last Name" value="<?php getInputValid('lastName'); ?>" required>

                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailInvalid);
                        echo $account->getError(Constants::$emailTaken);
                        echo $account->getError(Constants::$emailsDoNotMatch) ?>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="Email" value="<?php getInputValid('email'); ?>" required>

                    </p>
                    <p>
                        <label for="email2">Confirm Email</label>
                        <input id="email2" name="email2" type="email" placeholder="Confirm Email" required>

                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordsCharacters);
                        echo $account->getError(Constants::$passwordsDoNotMatch);
                        echo $account->getError(Constants::$passwordsNotAlphanumeric) ?>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" placeholder="Password" required>
                    </p>
                    <p>
                        <label for="password2">Confirm Password</label>
                        <input id="password2" name="password2" type="password" placeholder="Confirm Password" required>
                    </p>

                    <button type="submit" name="registerButton">SIGN UP</button>

                    <div class="hasAccountText">
                            <span id="hideRegister">Already have an account? Log in here.</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>