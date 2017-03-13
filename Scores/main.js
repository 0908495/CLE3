$.ajax({
    headers: { 'X-Auth-Token': 'fa4e7ba58ecf4b4a8f6447788c146282' },
    url: 'http://api.football-data.org/v1/fixtures?timeFrame=n1',
    dataType: 'json',
    type: 'GET',
}).done(function(response) {
    // do something with the response, e.g. isolate the id of a linked resource
    var regex = /.*?(\d+)$/; // the ? makes the first part non-greedy
    var res = regex.exec(response.fixtures[0]._links.awayTeam.href);
    var teamId = res[1];
    console.log(teamId);
}); 