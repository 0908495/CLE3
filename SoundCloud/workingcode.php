<script type="text/javascript">
    function nextSong(){
        SC.initialize({
            client_id: 'g0ATeGIhNpgzYpEKeegATafCvns2N2Gc'
        });
        //'/tracks/' + track.id

        SC.stream('/tracks/' + <?= $track ?>).then(function(player){
            player.play();
            player.on('finish', function() {
                reqwest({
                    url: 'streaming.php/',
                    success: nextSong
                    //
                });
            });
        }).catch(function(){
            console.log(arguments);
        });
    }

    nextSong();

</script>