<?php
include 'dbh.php';
session_start();
include 'FootballData.php';

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
    $recentMatch = array_filter($fixtures, function ($var) {
        return ($var -> status == 'FINISHED');
    });
    $count = count($recentMatch) - 1;
    $tot = count($recentMatch) - 5;

    $vibe = "";
    $homeTeam = $recentMatch[$count]->homeTeamName;
    $awayTeam = $recentMatch[$count]->awayTeamName;
    $goalHome = $recentMatch[$count]->result->goalsHomeTeam;
    $goalAway = $recentMatch[$count]->result->goalsAwayTeam;
    if ($homeTeam == 'Feyenoord Rotterdam'){
        if ($goalHome >= $goalAway){
            $vibe = "goed";
        } else {
            $vibe = "slecht";
        }
        $_SESSION['vibe'] = $vibe;
    } else {
        if ($goalAway >= $goalHome){
            $vibe = "goed";
        } else {
            $vibe = "slecht";
        }
        $_SESSION['vibe'] = $vibe;
    }

    // DB insert votes positive music list
    if(isset($_POST['votePositive'])){
        $single = $_POST['single'];
        $vote = 1;
        $users_id = $_SESSION['id'];

        // insert scores in db
        $queryPos = "INSERT INTO positive_vibe_votes (single, vote, users_id) 
            VALUES ('$single', '$vote', '$users_id')";
        mysqli_query($conn, $queryPos);
    }

    // DB insert votes negative music list
    if(isset($_POST['voteNegative'])){
        $single = $_POST['single'];
        $vote = 1;
        $users_id = $_SESSION['id'];

        // insert scores in db
        $queryNeg = "INSERT INTO negative_vibe_votes (single, vote, users_id) 
                VALUES ('$single', '$vote', '$users_id')";
        mysqli_query($conn, $queryNeg);
    }

    // DB insert predict match scores
    if (isset($_POST['submit']))
    {
        $home = $_POST['home'];
        $away = $_POST['away'];
        $users_id = $_SESSION['id'];

        // insert scores in db
        $sql = "INSERT INTO scores (home, away, users_id) 
          VALUES ('$home', '$away', '$users_id')";
        mysqli_query($conn, $sql);
    }

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
            <div class="col-md-6">
                <?php
                if($vibe == 'slecht'){
                    ?>
                    <h4>Kies een nummer positief</h4>
                    <form action="" method="POST">
                        <div class="checkbox">
                            <label><input type="checkbox" name="single" value="1">Option 1</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="single" value="2">Option 2</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="single" value="3">Option 3</label>
                        </div>
                        <button class="btn btn-custom" type="submit" name="votePositive">submit</button>
                    </form>
                <?php
                } else {
                    ?>
                    <h4>Kies een nummer negatief</h4>
                    <form action="" method="POST">
                        <div class="checkbox">
                            <label><input type="checkbox" name="single" value="1">Option 1</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="single" value="2">Option 2</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="single" value="3">Option 3</label>
                        </div>
                        <button class="btn btn-custom" type="submit" name="voteNegative">submit</button>
                    </form>
                <?php
                }
                ?>
                <hr>
            </div>

            <div class="col-md-6">
                <h4>Voorspel de score</h4>
                <form action="" method="POST">
                    <input type="number" name="home" placeholder="Thuis">
                    <input type="number" name="away" placeholder="Uit"><br>
                    <button class="btn btn-custom" type="submit" name="submit">submit</button>
                </form>
                <hr>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">

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
                            <td><?php echo $recentMatch[$x]->homeTeamName; ?></td>
                            <td>-</td>
                            <td><?php echo $recentMatch[$x]->awayTeamName; ?></td>
                            <td><?php echo $recentMatch[$x]->result->goalsHomeTeam; ?></td>
                            <td>:</td>
                            <td><?php echo $recentMatch[$x]->result->goalsAwayTeam; ?></td>
                        </tr>
                    <?php } ?>
            </div>
        </div>
    </div>


<!---->
<!--    <footer>-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-md-3" style="margin-top:30px; ">-->
<!--                    <a class="twitter-timeline" data-height="450" data-theme="light" href="https://twitter.com/Feyenoord">Tweets by Feyenoord</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </footer>-->
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>