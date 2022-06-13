<?php

// Connection variables 
$servername="localhost";
$username="root";
$password="";
$database="Garcia";

// Connect to MySQL Database
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>