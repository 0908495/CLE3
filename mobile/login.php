<?php
session_start();
//connect to db with dbh.php file
include 'dbh.php';


$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT id, username, password FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if(!$row = mysqli_fetch_assoc($result)){
    echo "Je bent gebruikersnaam of wachtwoord is onjuist";
}	else {
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];


    // sends you back to the login page
    header("Location: localhost/CLE3/mobile/index.php");
}

?>