<!DOCTYPE html>
<html>
  
    <head>
        <title>Spotify Web Playback SDK Template</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://sp-bootstrap.global.ssl.fastly.net/8.0.0/sp-bootstrap.min.css" rel="stylesheet" />
        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
        </script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        <script src="https://sdk.scdn.co/spotify-player.js"></script>
        <script src="app.js"></script>
        <script src="cont.js"></script>
    </head>
  
    <body class="container">
        <h1 class="text-salmon">Spotify Web Playback SDK Template</h1>
        <h4>This app uses the implicit grant authorization flow to get an access token and initialise the Web Playback SDK. It then uses the Spotify Connect Web API to play a song.</h4>
        <p>If everything is set up properly, you should hear some music!</p>
        <img id="current-track"/>
        <h3 id="current-track-name"></h3>
        <h3 id="duration"></h3>
        <h3 id="test"></h3>

        <h3 class="text-salmon">Information API</h3>
        <label class="text-salmon" for="device_id">DEVICE_ID</label><br>
        <input type="text" value="" id="device_id" readonly/><br><br>

        <label class="text-salmon" for="token">TOKEN</label><br>
        <input type="text" value="" id="token" readonly/>
        <br><br><br>


        <h3 class="text-salmon">Menu</h3>
        <button onclick="new_action('previous')"><<</button>
        <button onclick="new_action('play')"><i class="far fa-play-circle"></i></button>
        <button onclick="new_action('stop')"><i class="far fa-stop-circle"></i></button>
        <button onclick="new_action('resume')"><i class="far fa-resume-circle"></i></button>
        <button onclick="new_action('skip')">>></button>

        <br><br><br>

        <h3 class="text-salmon">Search Song/Playlist/Album/Artist</h3>
        <input type="text" id="name_song" value="" placeholder="Search name"/>

        <select id="type_song">
            <option value="">track</option>
            <option value="">album</option>
            <option value="">artist</option>
            <option value="">playlist</option>
        </select><br>

        <!--<input type="checkbox" id="create_new_playlist" checked/><label>Create new Playlist</label><br>-->

        <input type="button" onclick="new_action('search_song')" value="Search"/>


    </body>
  
</html>
