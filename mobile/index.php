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

    <div class="fb-login-button" data-max-rows="1" data-size="icon" data-show-faces="false" data-auto-logout-link="false"></div>
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

    <section style="background-color:#f7f7f7; padding: 30px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Met welk liedje support jij Feyenoord?</h1>
                    <p>..</p>
                    <p>..</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
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
                    $new = array_filter($fixtures, function ($var) {
                        return ($var -> status == 'FINISHED');
                    });
                    echo $new[25]->homeTeamName." - ";
                    echo $new[25]->awayTeamName;
                    ?><br><?php
                    echo $new[25]->result->goalsHomeTeam." - ";
                    echo $new[25]->result->goalsAwayTeam;
                    $thuis = $new[25]->homeTeamName;
                    $uit = $new[25]->awayTeamName;
                    $goalthuis = $new[25]->result->goalsHomeTeam;
                    $goaluit = $new[25]->result->goalsAwayTeam;
                    ?><br><?php
                    if ($thuis = 'Feyenoord Rotterdam'){
                        if ($goalthuis >= $goaluit){
                            echo "Positief";
                        } else {
                            echo "Negatief";
                        }
                    }
                    if ($thuis =! 'Feyenoord Rotterdam'){
                        if ($goaluit >= $goalthuis){
                            echo "Positief";
                        } else {
                            echo "Negatief";
                        }
                    }
                    ?>
                    <h3>Alle Feyenoordwedstrijden:</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Thuis</th>
                            <th></th>
                            <th>Uit</th>
                            <th colspan="3">Resultaat</th>
                        </tr>
                        <?php foreach ($new as $fixture) { ?>
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
    </section>

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