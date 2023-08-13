<?php
$servername = "localhost";
$username = "ratcatcher";
$password = "12345";
$dbname = "ratcatcher";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
