<?php
class Constants
{
        // ERRORS FOR REGISTER FROM
        public static $passwordsDoNotMatch      = "Your passwords don't match!";
        public static $passwordsNotAlphanumeric = "Your password can contain only letters and numbers";
        public static $passwordsCharacters      = "Your password must be between 5 and 30 characters";
        public static $emailInvalid             = "Email is invalid!";
        public static $emailsDoNotMatch         = "Your emails don't match";
        public static $emailTaken               = "This email is already in use.";
        public static $lastNameCharacters       = "Your Last Name must be between 2 and 25 characters";
        public static $firstNameCharacters      = "Your First Name must be between 2 and 25 characters";
        public static $usernameCharacters       = "Your Username must be between 5 and 25 characters";
        public static $usernameTaken            = "This Username already exists.";

        // ERRORS FOR LOGIN FORM
        public static $loginFailed              = "Your username or password was incorrect";
}
