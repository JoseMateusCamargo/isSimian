<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "issimian";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    return false;
} else
    return $conn;
