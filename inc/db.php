<?php
$DBservername = "localhost";
$DBusername = "root";
$DBpassword = "admin";
$DBdatabase = "showsaver";

// Create connection
$conn = new mysqli($DBservername, $DBusername, $DBpassword, $DBdatabase);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>