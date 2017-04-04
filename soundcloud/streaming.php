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
        $track = 123193944;
        $_SESSION['track'] = $track;
    } elseif ($row2['total2'] == (max($row1['total1'], $row2['total2'], $row3['total3']))) {
        $track = 211547947;
        $_SESSION['track'] = $track;
    } else {
        $track = 192101815;
        $_SESSION['track'] = $track;
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
        $track = 98849365;
        $_SESSION['track'] = $track;
    } elseif ($row2['total2'] == (max($row1['total1'], $row2['total2'], $row3['total3']))) {
        $track = 16266948;
        $_SESSION['track'] = $track;
    } else {
        // hand in hand
        $track = 59500241;
        $_SESSION['track'] = $track;
    }

}

$track = $_SESSION['track'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SDK playground - Streaming</title>
    <script type="text/javascript" src="http://connect.soundcloud.com/sdk/sdk-3.1.2.js"></script>
</head>
<body>
<script type="text/javascript">
    SC.initialize({
        client_id: 'g0ATeGIhNpgzYpEKeegATafCvns2N2Gc'
    });
    //'/tracks/' + track.id

    SC.stream('/tracks/' + <?= $track ?>).then(function(player){
        player.play();
        player.on('finish', function() {
            console.log("Hoi");
        });
    }).catch(function(){
        console.log(arguments);
    });

</script>
</body>
</html>