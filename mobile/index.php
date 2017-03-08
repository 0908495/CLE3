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
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="img/fey-logo.png" height="50px" width="auto" </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
                // Create instance of API class
                $api = new FootballData();
                // fetch and dump summary data for premier league' season 2015/16
                $soccerseason = $api->getSoccerseasonById(398);
                ?>
<!--                <h3>Fixtures for the 1st matchday of --><?php //echo $soccerseason->payload->caption; ?><!--</h3>-->
<!--                <table class="table table-striped">-->
<!--                    <tr>-->
<!--                        <th>HomeTeam</th>-->
<!--                        <th></th>-->
<!--                        <th>AwayTeam</th>-->
<!--                        <th colspan="3">Result</th>-->
<!--                    </tr>-->
<!--                    --><?php //foreach ($soccerseason->getFixturesByMatchday(1) as $fixture) { ?>
<!--                        <tr>-->
<!--                            <td>--><?php //echo $fixture->homeTeamName; ?><!--</td>-->
<!--                            <td>-</td>-->
<!--                            <td>--><?php //echo $fixture->awayTeamName; ?><!--</td>-->
<!--                            <td>--><?php //echo $fixture->result->goalsHomeTeam; ?><!--</td>-->
<!--                            <td>:</td>-->
<!--                            <td>--><?php //echo $fixture->result->goalsAwayTeam; ?><!--</td>-->
<!--                        </tr>-->
<!--                    --><?php //} ?>
<!--                </table>-->
<!--                --><?php
//                echo "<p><hr><p>";
//                // fetch all available upcoming fixtures for the next week and display
//                $now = new DateTime();
//                $end = new DateTime(); $end->add(new DateInterval('P7D'));
//                $response = $api->getFixturesForDateRange($now->format('Y-m-d'), $end->format('Y-m-d'));
//                ?>
<!--                <h3>Upcoming fixtures next 7 days</h3>-->
<!--                <table class="table table-striped">-->
<!--                    <tr>-->
<!--                        <th>HomeTeam</th>-->
<!--                        <th></th>-->
<!--                        <th>AwayTeam</th>-->
<!--                        <th colspan="3">Result</th>-->
<!--                    </tr>-->
<!--                    --><?php //foreach ($response->fixtures as $fixture) { ?>
<!--                        <tr>-->
<!--                            <td>--><?php //echo $fixture->homeTeamName; ?><!--</td>-->
<!--                            <td>-</td>-->
<!--                            <td>--><?php //echo $fixture->awayTeamName; ?><!--</td>-->
<!--                            <td>--><?php //echo $fixture->result->goalsHomeTeam; ?><!--</td>-->
<!--                            <td>:</td>-->
<!--                            <td>--><?php //echo $fixture->result->goalsAwayTeam; ?><!--</td>-->
<!--                        </tr>-->
<!--                    --><?php //} ?>
<!--                </table>-->

                <?php
                echo "<p><hr><p>";
                // search for desired team
                $searchQuery = $api->searchTeam(urlencode("Feyenoord"));
                // var_dump searchQuery and inspect for results
                $response = $api->getTeamById($searchQuery->teams[0]->id);
                $fixtures = $response->getFixtures('')->fixtures;
                ?>
                <h3>Alle Feyenoordwedstrijden:</h3>
                <table class="table table-striped">
                    <tr>
                        <th>Thuis</th>
                        <th></th>
                        <th>Uit</th>
                        <th colspan="3">Resultaat</th>
                    </tr>
                    <?php foreach ($fixtures as $fixture) { ?>
                        <tr>
                            <td><?php echo $fixture->homeTeamName; ?></td>
                            <td>-</td>
                            <td><?php echo $fixture->awayTeamName; ?></td>
                            <td><?php echo $fixture->result->goalsHomeTeam; ?></td>
                            <td>:</td>
                            <td><?php echo $fixture->result->goalsAwayTeam; ?></td>
                        </tr>
                    <?php } ?>
                </table>



<!--                --><?php
//                echo "<p><hr><p>";
//                // fetch players for a specific team
//                $team = $api->getTeamById($searchQuery->teams[0]->id);
//                ?>
<!--                <h3>Players of --><?php //echo $team->_payload->name; ?><!--</h3>-->
<!--                <table class="table table-striped">-->
<!--                    <tr>-->
<!--                        <th>Name</th>-->
<!--                        <th>Position</th>-->
<!--                        <th>Jersey Number</th>-->
<!--                        <th>Date of birth</th>-->
<!--                    </tr>-->
<!--                    --><?php //foreach ($team->getPlayers() as $player) { ?>
<!--                        <tr>-->
<!--                            <td>--><?php //echo $player->name; ?><!--</td>-->
<!--                            <td>--><?php //echo $player->position; ?><!--</td>-->
<!--                            <td>--><?php //echo $player->jerseyNumber; ?><!--</td>-->
<!--                            <td>--><?php //echo $player->dateOfBirth; ?><!--</td>-->
<!--                        </tr>-->
<!--                    --><?php //} ?>
                </table>
            </div>
        </div>
    </div>


    <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a class="twitter-timeline" data-height="450" data-theme="light" href="https://twitter.com/Feyenoord">Tweets by Feyenoord</a>
            </div>
            <div class="col-md-3">
                <iframe src=”http://www.facebook.com/plugins/like.php?href=https://www.facebook.com/feyenoord/” scrolling="yes" frameborder="0" style="border:none; width:450px; height:80px"></iframe>
            </div>
        </div>
    </div>

    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>