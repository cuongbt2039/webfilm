<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  crossorigin="anonymous">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container-fluid" style="height: 100%">
            <div class="col-md-10"  id="player" style="height: 95%">
                
            </div>
            <div class="col-md-2" style="padding: 0">
                <div class="playing">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/wbvNDRVqDDI" frameborder="0" allowfullscreen></iframe>
                </div>
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/wbvNDRVqDDI" frameborder="0" allowfullscreen></iframe>
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/wbvNDRVqDDI" frameborder="0" allowfullscreen></iframe>
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/wbvNDRVqDDI" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="http://www.youtube.com/player_api"></script>
        <script>
            // create youtube player
            var player;
            function onYouTubePlayerAPIReady() {
               palyer('wbvNDRVqDDI');
            }

            // when video ends
            function onPlayerStateChange(event) {
                if (event.data === 0) {
                    palyer('webLpkrTpOg');
                }
            }
            function palyer(id){
                if(player){
                  player.loadVideoById(id, 5, "large");
                }else{
                    player = new YT.Player('player', {
                    height: '390',
                    width: '640',
                    videoId: id,
                    events: {
                      'onReady': onPlayerReady,
                      'onStateChange': onPlayerStateChange
                    }
                });
                }
            }
             // autoplay video
            function onPlayerReady(event) {
                event.target.playVideo();
            }
        </script>
    </body>
</html>
