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

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <iframe width="100%" height="600px" src="https://www.youtube.com/embed/KuqYhSAMqH0" frameborder="0" allowfullscreen></iframe>
                <div class="col-md-12">
                    Top 3
                </div>
                <div class="col-md-4">
                    liedje 1
                </div>
                <div class="col-md-4">
                    liedje 2
                </div>
                <div class="col-md-4">
                    liedje 3
                </div>
            </div>
                <div class="col-md-4">
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
            </div>
        </div>
    </div>
</section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>