<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "account_creation";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){

    die("Failed to connect!");
}

?>