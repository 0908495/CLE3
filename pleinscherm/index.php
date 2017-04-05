<?php
include 'FootballData.php';
include ("../soundcloud/streaming.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CLE 3 - mobile</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <iframe id="iframe" width="100%" height="750px" src="https://www.youtube.com/embed/Hs6vJ8W3H4g?rel=0&amp;controls=1&amp;showinfo=0;autoplay=1;loop=1; frameborder="0" allowfullscreen ></iframe>
            <h4 style="padding:10px 20px 10px 20px; font-weight: 300;">Stem via <b>localhost/cle3/new-mobile/</b> op jouw supporterslied en voorspel de scores!</h4>
            </div>
                <div class="col-md-4">
                    <img src="img/fey-logo.png" height="100px" width="auto" style="margin-left: auto; margin-right: auto; display: block; margin-top: 30px; margin-bottom:30px;"/>
                    <hr>
                    <?php
                    // Create instance of API class
                    $api = new FootballData();
                    // fetch and dump summary data for premier league' season 2015/16
                    $soccerseason = $api->getSoccerseasonById(398);
                    // search for desired team
                    $searchQuery = $api->searchTeam(urlencode("Feyenoord"));

                    // var_dump searchQuery and inspect for results
                    $response = $api->getTeamById($searchQuery->teams[0]->id);
                    $fixtures = $response->getFixtures('')->fixtures;
                    array_slice($fixtures, -3, 3, true);
                    $new = array_filter($fixtures, function ($var) {
                        return ($var -> status == 'FINISHED');
                    });
                    $count = count($new) - 1;
                    $tot = count($new) - 5;
                    ?>
                    <h3>De laatste 5 wedstrijden:</h3>
                    <table class="table table-striped" style="font-size: 16px;">
                        <tr>
                            <th>Thuis</th>
                            <th></th>
                            <th>Uit</th>
                            <th colspan="3">Resultaat</th>
                        </tr>
                        <?php for ($x = $count; $x >= $tot; $x--) { ?>
                            <tr>
                                <td><?php echo $new[$x]->homeTeamName; ?></td>
                                <td>-</td>
                                <td><?php echo $new[$x]->awayTeamName; ?></td>
                                <td><?php echo $new[$x]->result->goalsHomeTeam; ?></td>
                                <td>:</td>
                                <td><?php echo $new[$x]->result->goalsAwayTeam; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <hr>
                    <div id="picOne">
                        Hand in hand kameraden<br>
                        Hand in hand voor Feyenoord 1<br>
                        Geen woorden maar daden<br>
                        Leve Feyenoord 1<br>
                    </div>
                        <div id="picTwo">
                        Hand in hand kameraden<br>
                        Hand in hand voor Feyenoord 1<br>
                        Geen woorden maar daden<br>
                        Leve Feyenoord 1<br>
                    </div>
                    <div id="picThree">
                        Ga je mee naar 't stadion<br>
                        Naar de ploeg<br>
                        Van Rood en Wit<br>
                        Je zoekt een plaatsje in de zon<br>
                        Waar je zo<br>
                        Gezellig zit<br>
                    </div>
                        <div id="picFour">
                        Kijk ze komen op het veld<br>
                        En gejuich uit duizend kelen<br>
                        Want je staat ervan versteld<br>
                        Als de sterrenploeg gaat spelen<br>
                        Dan is altijd wat je hoort<br>
                        Het lied van Feyenoord<br>
                        </div>

                    <div id="picFive">
                        Hand in hand kameraden<br>
                        Hand in hand voor Feyenoord 1<br>
                        Geen woorden maar daden<br>
                        Leve Feyenoord 1<br>
                    </div>
                    <div id="picSix">
                        Hand in hand kameraden<br>
                        Hand in hand voor Feyenoord 1<br>
                        Geen woorden maar daden<br>
                        Leve Feyenoord 1<br>
                    </div>

                    <div id="picSeven">
                        Wat een spanning wat een sfeer<br>
                        Kijk de bal<br>
                        Gaat langs de lijn<br>
                        Heel de Kuip gaat wild te keer<br>
                        bij een sprint van Coen Moulijn<br>
                    </div>

                        <div id="picEight">
                        Onze beertje heel wat mans<br>
                        Geeft een bal om niet te missen<br>
                        Van der Gijp Daar komt je kans<br>
                        Laat de keeper nou eens vissen<br>
                        Als een doelpunt word gescoord<br>
                        En dan brult heel Feyenoord<br>
                        </div>

                    <div id="picNine">
                        Hand in hand kameraden<br>
                        Hand in hand voor Feyenoord 1<br>
                        Geen woorden maar daden<br>
                        Leve Feyenoord 1<br>
                    </div>

                    <div id="picTen">
                        Hand in hand kameraden<br>
                        Hand in hand voor Feyenoord 1<br>
                        Geen woorden maar daden<br>
                        Leve Feyenoord 1<br>
                    </div>
                    </div>

                </div>
        </div>
    </div>
    <div id="target"></div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="//connect.soundcloud.com/sdk.js"></script>
    <script src="main.js"></script>

</body>
</html>