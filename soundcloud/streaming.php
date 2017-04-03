<html>
<head>
    <meta charset="utf-8">
    <title>SDK playground - Streaming</title>
    <script type="text/javascript" src="http://connect.soundcloud.com/sdk/sdk-3.1.2.js"></script>
    <style media="screen">
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: sans-serif;
        }

        input {
            font-size: 20px;
        }

        #info {
            display: none;
        }

        input, p {
            width: 90%;
            margin-bottom: 10px;
            margin-top: 0;
        }

        @media (min-width: 500px) {
            input, p {
                width: 500px;
            }
        }
    </style>
</head>
<body>
<?php
session_start();
$vibe = $_SESSION['vibe'];
echo $vibe;
if ($vibe == "goed"){
    $strings = array('20230709','17174641');
//    $strings = array('59500241', '192101815', '248545823');
    $track = $strings[array_rand($strings)];
    $hoi = 1;
} else {
    $strings = array('20230709','17174641');
//    $strings = array('98849365', '211547947', '123193944');
    $track = $strings[array_rand($strings)];
}
?>
<script type="text/javascript">
    SC.initialize({
        client_id: 'g0ATeGIhNpgzYpEKeegATafCvns2N2Gc'
    });
    //'/tracks/' + track.id

    SC.stream('/tracks/' + <?= $track ?>).then(function(player){
        player.play();
        player.on('finish', function() {
            <?php
            $finish = 1;
            $_SESSION['finish'] = $finish;
            ?>
        });
    }).catch(function(){
        console.log(arguments);
    });


//    player.on('finish', function() {
//        console.log('hoi');
//    });

</script>
</body>
</html>