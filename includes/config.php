<?php
// Intro step to communicate with MySQL database
ob_start();
session_start();

$timezone = date_default_timezone_set("Europe/Chisinau");
$con      = mysqli_connect("localhost","root", "", "slotify");

if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}