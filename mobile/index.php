<?php
include 'FootballData.php';
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

<img src="img/fey-logo.png" height="100px" width="auto" style="margin-left: auto; margin-right: auto; display: block; margin-top: 30px; margin-bottom:30px;"/>


    <div class="container" style="background-color: #f7f7f7; padding-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <div class='ajax-poll' tclass='poll-background-image' style='width:800px;'></div>
                <script type="text/javascript" src="/CLE3/stemmen/APSMX-318/APSMX-318/web/jquery.js"></script>
                <script type="text/javascript" src="/CLE3/stemmen/APSMX-318/APSMX-318/web/ajax-poll.php"></script>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-12">
                <h4>Voorspel de score</h4>
                <form action="#">
                    <input type="number" name="Feyenoord" value="" placeholder="Thuis">
                    <input type="number" name="Uit" value=""  placeholder="Uit"><br>
                    <input class="button-custom" type="submit" value="Voorspel" >
                </form>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">


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
                <h4>De laatste 5 wedstrijden:</h4>
                <table class="table table-striped">
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
<!--                --><?php
//                $thuis = $new[25]->homeTeamName;
//                $uit = $new[25]->awayTeamName;
//                $goalthuis = $new[25]->result->goalsHomeTeam;
//                $goaluit = $new[25]->result->goalsAwayTeam;
//                ?><!--<br>--><?php
//                if ($thuis = 'Feyenoord Rotterdam'){
//                    if ($goalthuis >= $goaluit){
//                        echo "Positief";
//                    } else {
//                        echo "Negatief";
//                    }
//                }
//                if ($thuis =! 'Feyenoord Rotterdam'){
//                    if ($goaluit >= $goalthuis){
//                        echo "Positief";
//                    } else {
//                        echo "Negatief";
//                    }
//                }
//                ?>
            </div>
        </div>
    </div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a class="twitter-timeline" data-height="450" data-theme="light" href="https://twitter.com/Feyenoord">Tweets by Feyenoord</a>
            </div>
        </div>
    </div>

    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>