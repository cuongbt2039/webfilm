function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
checkCookie("cookie_code");
getUserEpisode();
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(cname) {
    if (getCookie(cname) != "") {
        setCookie("cookie_code", cookie_code, 100000);
    }
}
function sendUserEpisode() {
    if(player && current_time != player.currentTime){
        $.ajax({
            data: {cookie_code: cookie_code, episode_id: id_video_playing, time: player.currentTime},
            type: "post",
            url: "/api/player/post",
            success: function (result) {
                console.log(result);
            },
            error: function () {
                console.log("error");
            }
        });
    }
    
}
// create youtube player
var player;
function palyer(id, time) {
    $('#' + id_video_playing).removeClass(playing);
    id_video_playing = id;
    $('#' + id_video_playing).addClass('playing')
    if (player) {
        player.load(id, {
            autoplay: true,
            start: time
        });
    } else {
        player = DM.player(document.getElementById("player"), {
        video: id,
        width: "100%",
        height: "100%",
        params: {
            autoplay: false,
            mute: true,
            start: time
        }
    });
    }
}

//player.addEventListener('playing', function(event) {
//  alert('12');
//});
//player.addEventListener('pause', function(event) {
//  alert('12b');
//});

setInterval(
    function(){ 
        sendUserEpisode();
    }, 
    10000
);

function getUserEpisode() {
    $.ajax({
        data: {},
        type: "get",
        url: "/api/player/get",
        dataType: 'json',
        success: function (result) {
            if (result.success) {
                palyer(result[0].youtube_id, result[0].current_time);
            } else {
                palyer(result.youtube_id, 0);
            }
        },
        error: function () {
            console.log("error");
        }
    });
}
$('.episode-right').click(function(){
   var vid = $('.episode-right').attr('id');
   palyer(vid, 0);
});