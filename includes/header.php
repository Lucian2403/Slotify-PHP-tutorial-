<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");

// session_destroy();
if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
    header("Location: register.php");
}
?>
<!--HTML TEMPLATE-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Slotify</title>

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<main id="mainContainer">
    <div id="topContainer">
        <!--Navigation Bar Section-->
        <?php include("includes/navBarContainer.php"); ?>

        <div id="mainViewContainer">
            <div id="mainContent">