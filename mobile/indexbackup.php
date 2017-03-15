<html>
<body>
                <?php
                include 'FootballData.php';
                Header('Content-type: application/json');
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
                print_r($new);
                echo json_encode($new);
                ?>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>