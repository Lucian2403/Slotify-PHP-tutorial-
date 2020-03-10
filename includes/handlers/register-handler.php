<?php

// Functions for protection and cleaner input fields
function sanitizeFormUsername($inputText) {
    $inputText = strip_tags($inputText); //for protection! Strip HTML and PHP tags from a string
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

//    verify if register button is pressed
if(isset($_POST['registerButton'])) {
    $username  = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName  = sanitizeFormUsername($_POST['lastName']);
    $email     = sanitizeFormUsername($_POST['email']);
    $email2    = sanitizeFormUsername($_POST['email2']);
    $password  = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);

    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

    if($wasSuccessful == true) {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
}

