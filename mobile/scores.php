<?php
include 'FootballData.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CLE 3 - mobile</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<img src="img/fey-logo.png" class="logo" height="100px" width="auto"/>

<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="scores.php">Score overzicht</a></li>
                <?php
                if(isset($_SESSION['id'])){ ?>
                    <li><a href="logout.php">Uitloggen</a></li>
                    <?php
                } else { ?>
                    <li><a href="profile.php">Inloggen</a></li>
                    <?php
                }
                ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>

<div class="container" style="background-color: #f7f7f7; padding-top: 20px; padding-bottom: 20px;">
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

            ?>
            <h4>Alle Feyenoord wedstrijden:</h4>
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
        </div>
    </div>
</div>

</body>
</html>