<?php
include 'dbh.php';
session_start();


    // insert scores in db
    $query = "select SUM(vote) AS total from positive_vibe_votes WHERE single='3'";
    $result = mysqli_query($conn, $query);;
    $row = mysqli_fetch_assoc($result);

echo $row['total'];



?>