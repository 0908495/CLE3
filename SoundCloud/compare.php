<?php
include 'dbh.php';
session_start();

$vibe = $_SESSION['vibe'];

if($vibe == 'goed') {
// insert scores in db
    $sql = "select SUM(vote) AS total1 from positive_vibe_votes WHERE single='1'";
    $result1 = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result1);


// insert scores in db
    $sql1 = "select SUM(vote) AS total2 from positive_vibe_votes WHERE single='2'";
    $result2 = mysqli_query($conn, $sql1);
    $row2 = mysqli_fetch_assoc($result2);


// insert scores in db
    $sql2 = "select SUM(vote) AS total3 from positive_vibe_votes WHERE single='3'";
    $result3 = mysqli_query($conn, $sql2);
    $row3 = mysqli_fetch_assoc($result3);


    if ($row1['total1'] == (max($row1['total1'], $row2['total2'], $row3['total3']))) {
        echo "Liedje 1 wint";
    } elseif ($row2['total2'] == (max($row1['total1'], $row2['total2'], $row3['total3']))) {
        echo 'Liedje 2 wint';
    } else {
        echo 'Liedje 3 wint';
    }
} else {

    // insert scores in db
    $sql = "select SUM(vote) AS total1 from negative_vibe_votes WHERE single='1'";
    $result1 = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result1);


    // insert scores in db
    $sql1 = "select SUM(vote) AS total2 from negative_vibe_votes WHERE single='2'";
    $result2 = mysqli_query($conn, $sql1);
    $row2 = mysqli_fetch_assoc($result2);


    // insert scores in db
    $sql2 = "select SUM(vote) AS total3 from negative_vibe_votes WHERE single='3'";
    $result3 = mysqli_query($conn, $sql2);
    $row3 = mysqli_fetch_assoc($result3);


    if ($row1['total1'] == (max($row1['total1'], $row2['total2'], $row3['total3']))) {
        echo "Liedje 1 wint";
    } elseif ($row2['total2'] == (max($row1['total1'], $row2['total2'], $row3['total3']))) {
        echo 'Liedje 2 wint';
    } else {
        echo 'Liedje 3 wint';
        $track = 59500241;
        $_SESSION['track'] = $track;
    }

}