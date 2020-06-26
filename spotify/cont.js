
function new_action(action) {
    var device_id = document.getElementById('device_id').value;

    if(action == 'skip') {
        skip(device_id)
    }

    if(action == 'previous') {
        previous(device_id)
    }

    if(action == 'play') {
        play(device_id, id)
    }
    
    if(action == 'stop') {
        stop_music(device_id)
    }

    if(action == 'resume') {
        resume(device_id)
    }

    if(action == 'add') {
        add_song(device_id)
    }

    if(action == 'search_song') {
        var name_song = document.getElementById('name_song').value;


        var e = document.getElementById("type_song");
        var selected = e.options[e.selectedIndex].text;

        search(name_song, selected, device_id)
    }
    
}




// Play a specified track
function play(device_id, id, type) {

    if(type == 'playlist') {
        var finished_uri = '"' + id.join('","') + '"';
    }
    if(type == 'album') {
        var finished_uri = '"' + id.join('","') + '"';
    }
    if(type == 'track') {
        

        // splice(position, numberOfItemsToRemove, item)
        console.log(finished_uri)
        finished_uri.splice(0, 0, id);

        var finished_uri = '"' + id.join('","') + '"';

    }
    console.log(finished_uri);

    $.ajax({
        url: "https://api.spotify.com/v1/me/player/play?device_id=" + device_id,
        type: "PUT",
        data: '{"uris": [' +  finished_uri  + ']}',
        beforeSend: function(xhr){xhr.setRequestHeader('Authorization', 'Bearer ' + _token );},
        success: function(data) {
            // console.log(data)
        }
    });
}

function stop_music(device_id) {
    $.ajax({
        url: "https://api.spotify.com/v1/me/player/pause?device_id=" + device_id,
        type: "PUT",
        beforeSend: function(xhr){xhr.setRequestHeader('Authorization', 'Bearer ' + _token );},
        success: function(data) {
            // console.log(data)
        }
    });
}

function resume(device_id) {
    $.ajax({
        url: "https://api.spotify.com/v1/me/player/pause?device_id=" + device_id,
        type: "PUT",
        beforeSend: function(xhr){xhr.setRequestHeader('Authorization', 'Bearer ' + _token );},
        success: function(data) {
            // console.log(data)
        }
    });
}



function search(song_name, type_song, device_id) {

    $.ajax({
        url: 'https://api.spotify.com/v1/search',
        headers: {
            'Authorization': `Bearer ${_token}`,
        },
        data: {
            'q': song_name,
            'type': type_song
        },
        success: function(response) {
            // console.log(response);


            // get playlist/song/... id
            if(type_song == 'playlist') {
                var id = response.playlists.items[0].id;
                get_playlist_songs(device_id, id, 'playlist')
            }

            if(type_song == 'track') {
                var id = response.tracks.items[0].uri;
                play(device_id, id, 'track')
                
            }

            if(type_song == 'album') {
                get_playlist_songs(device_id, id, 'album')
            }
        }

    });

    

}


// filters ALL songs from a playlist
function get_playlist_songs(device_id, id, type) {

    var unfiltered_play_playlist = [];
    var play_playlist = [];

    $.ajax({
        url: 'https://api.spotify.com/v1/playlists/' + id + '/tracks',
        headers: { 'Authorization': 'Bearer ' + _token},
        method: 'GET',
        success: result => {
            var limit = result.limit
            if(limit > 25) {
                limit = 25;
            }

            // get the URI of PLAYLIST/SONG/...
            for(i = 0; i < limit; i++) {
                var track_id = result.items[i].track.uri
                unfiltered_play_playlist.push(track_id);
            }

            // filter existing tracks out
            for(i=0; i<unfiltered_play_playlist.length; i++) {  
                if(!play_playlist.includes(unfiltered_play_playlist[i])) {
                    play_playlist.push(unfiltered_play_playlist[i]); 
                }
            }

            play(device_id, play_playlist, type)
        }
    });
}


/* skip */
function skip(device_id) {
    $.ajax({
        url: 'https://api.spotify.com/v1/me/player/next?device_id=' + device_id,
        headers: { 'Authorization': 'Bearer ' + _token},
        method: 'POST',
        success: result => {
            console.log('skipped');
        }
    });
}

/* previous */
function previous(device_id) {
    $.ajax({
        url: 'https://api.spotify.com/v1/me/player/previous?device_id=' + device_id,
        headers: { 'Authorization': 'Bearer ' + _token},
        method: 'POST',
        success: result => {
            console.log('previous');
        }
    });
}


function add_song(device_id) {
    $.ajax({
        url: 'https://api.spotify.com/v1/me/player/queue?device_id=' + device_id,
        headers: { 'Authorization': 'Bearer ' + _token},
        method: 'POST',
        data: '{"uris": ["spotify:track:211VnuFbktg7rP2X5SwxJ4"]}',
        success: result => {
            console.log('successfully added song');
        }
    });
}