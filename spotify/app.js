// Get the hash of the url
const hash = window.location.hash
.substring(1)
.split('&')
.reduce(function (initial, item) {
  if (item) {
    var parts = item.split('=');
    initial[parts[0]] = decodeURIComponent(parts[1]);
  }
  return initial;
}, {});
window.location.hash = '';

// Set token
let _token = hash.access_token;

const authEndpoint = 'https://accounts.spotify.com/authorize';

// Replace with your app's client ID, redirect URI and desired scopes
const clientId = '229d57dc71f7413c8191eb9b9cb8f39f';
const redirectUri = 'http://localhost/spotify/spotify.php';
const scopes = [
  'streaming',
  'user-read-private',
  'user-modify-playback-state',
  'user-read-playback-position',
  'user-read-recently-played',
  'user-library-read',
  'user-read-playback-state',
  'user-read-currently-playing'
];

// If there is no token, redirect to Spotify authorization
// _token = "BQAhU1V4pzkQ8YVBN3aGIggHK5jUP5PE31fhn7iz2sDFnuPDuLRiKvZRuD_9Pakwy2FeX9LHEPw04XQzSNubvgBtSUY9DQpWQHwJMLHMYz55hIOzkv-2Wq29j-2_u5bFIvTKgPZdlr6H1pbdx_75y76VUHjUAorWu4WThGsELG_GrsBhFGd9";

if (!_token) {
    window.location = `${authEndpoint}?client_id=${clientId}&redirect_uri=${redirectUri}&scope=${scopes.join('%20')}&response_type=token&show_dialog=true`;
}
console.log(_token)
// Set up the Web Playback SDK




window.onSpotifyPlayerAPIReady = () => {


    const player = new Spotify.Player({
        name: 'Web Playback SDK Template',
        getOAuthToken: cb => { cb(_token); }
    });

    // Error handling
    player.on('initialization_error', e => console.error(e));
    player.on('authentication_error', e => console.error(e));
    player.on('account_error', e => console.error(e));
    player.on('playback_error', e => console.error(e));

    
    function toseconds(millis) {
        var minutes = Math.floor(millis / 60000);
        var seconds = ((millis % 60000) / 1000).toFixed(0);
        return minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
    }


    player.on('player_state_changed', state => {
        $('#current-track').attr('src', state.track_window.current_track.album.images[0].url);
        $('#current-track-name').text(state.track_window.current_track.name);
        $('#duration').text(toseconds(state.duration));
        
        try {
            let {
                next_tracks: [next_track]
            } = state.track_window;
            $('#test').text(next_track['name']);
        }catch{
            console.log("Next song cant be played")
        }
    });


    /* Player On */
    player.on('ready', data => {

        // sets volume to 75%
        player.setVolume(0.5).then(() => {
            console.log('Volume updated!');
        });

        console.log('Ready with Device ID ' + data.device_id);

        document.getElementById('device_id').value = data.device_id;
        document.getElementById('token').value = _token;                  // creates cookie with the device_id

    });
    player.connect();


    // Sets the name of the Speaker
    player.setName("Spotify Speaker - Smarthome");


    // Get Volume
    player.getVolume().then(volume => {
        let volume_percentage = volume * 100;
        $('#test').text(volume_percentage);
    });

}

// actions at file cont.js