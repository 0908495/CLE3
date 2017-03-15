
window.onload = function () {
    SC.initialize({
        client_id: 'g0ATeGIhNpgzYpEKeegATafCvns2N2Gc'
    });

    var menuLinks = document.getElementsByClassName('genre');
    for (var i = 0; i <menuLinks.length;i++){
        var menuLink = menuLinks[i];
        menuLink.onclick = function (e) {
            e.preventDefault();
            playSomeSound(menuLink.innerHTML);
        }
    }
};

function playSomeSound(genre) {
    SC.get('/tracks',{
        genres: genre,
        bpm:{
            from: 100
        }
    }, function(tracks) {
        var random = Math.floor(Math.random()*49);
        SC.oEmbed(tracks[random].uri, { autoplay: true}, document.getElementById('target'));
    });
}
