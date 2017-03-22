<?php

//connect to db with dbh.php file
include 'dbh.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];


$sql = "INSERT INTO users (username, password) 
	VALUES ('$username', '$password')";
mysqli_query($conn, $sql);

// sends you back to the homepage
header("Location: profiel.php");
?>
