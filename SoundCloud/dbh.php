<?php
// connect to database
$conn = mysqli_connect("localhost", "root", "0908495", "feyenoord");

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

?>