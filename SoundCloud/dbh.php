<?php
// connect to database
$conn = mysqli_connect("localhost", "root", "", "feyenoord");

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

?>