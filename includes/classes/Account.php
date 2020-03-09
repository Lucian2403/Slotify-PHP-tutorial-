<?php
class Account {

    private $con;
    private $errorArray;
    
    public function __construct($con)
    {
        $this->con = $con;
        $this->errorArray = array();
    }

    // REGISTRATION RULE FUNCTION
    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2)
    {
        $this->validateUsername($un);
        $this->validateFirstname($fn);
        $this->validateLastname($ln);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);

        if(empty($this->errorArray)) {
            //insert into database
            return $this->insertUserDetail($un, $fn, $ln, $em, $pw);
        }
        else {
            return false;
        }
    }

    // check if validating inputs get error(s), then create a span text with that error and assign into HTML
    public function getError($error) {
        if(!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }


    private function insertUserDetail($un, $fn, $ln, $em, $pw) {
        //Turn security (encryption) on for password (random numbers and letters)
        $encryptedPw = md5($pw);
        $profilePic = "assets/images/profile-pics/profile_pic.png";
        $date = date("Y-m-d");

        $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
        return $result;
    }

    //check if the input are following some patterns
    private function validateUsername($un)
    {
        //strlen = length of a string
        if(strlen($un) > 25 || strlen($un) < 5) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        //Check if username already exists
        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username = '$un'");
        if(mysqli_num_rows($checkUsernameQuery) != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
            return;
        }
    }

    private function validateFirstname($fn)
    {
        //strlen = length of a string
        if(strlen($fn) > 25 || strlen($fn) < 2) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
        }
    }

    private function validateLastname($ln)
    {
        //strlen = length of a string
        if(strlen($ln) > 25 || strlen($ln) < 2) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;
        }
    }

    private function validateEmails($em, $em2)
    {
        if($em != $em2) {
            array_push($this->errorArray, Constants::$emailsDoNotMatch);
            return;
        }
        //checks if the email is in email format (more detailed than type=email)
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        //Check if email already exists
        $checkEmailQuery = mysqli_query($this->con, "SELECT username FROM users WHERE email = '$em'");
        if(mysqli_num_rows($checkEmailQuery) != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
            return;
        }
    }

    private function validatePasswords($pw, $pw2)
    {
        if($pw != $pw2) {
            array_push($this->errorArray,Constants::$passwordsDoNotMatch);
            return;
        }

        // The pattern of password (if it's NOT(^) in the range of A-Z, a-z, 0-9)
        if(preg_match('/[^A-Za-z0-9]/', $pw)) {
            array_push($this->errorArray,Constants::$passwordsNotAlphanumeric);
            return;
        }

        if(strlen($pw) > 30 || strlen($pw) < 5) {
            array_push($this->errorArray, Constants::$passwordsCharacters);
            return;
        }
    }
}