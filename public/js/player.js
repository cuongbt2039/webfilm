var player;
function playAuto() {
    getUserEpisode();
}

function playByEpisode(viedeo_id, current_time) {
    palyer(viedeo_id, current_time);
}

function sendUserEpisode() {
    if (player && current_time != player.currentTime) {
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
function palyer(id, time) {
    $('#' + id_video_playing).removeClass('playing');
    id_video_playing = id;
    $('#' + id_video_playing).addClass('playing');
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
        player.addEventListener('video_end', function (event) {
            nextEpisode();
        });
    }
}

setInterval(
    function () {
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
                palyer(result[0].video_id, result[0].current_time);
            } else {
                palyer(result.video_id, 0);
            }
        },
        error: function () {
            console.log("error");
        }
    });
}
$('.episode-right').click(function () {
    var number_episode = $(this).attr('id');
    window.location = "/nguoi-phan-xu-tap-" + number_episode;
});
function nextEpisode() {
    $.ajax({
        type: "get",
        url: "/api/player/next",
        data: {'episode_id': id_video_playing},
        dataType: 'json',
        success: function (result, textStatus, xhr) {
            if (xhr.status == 200) {
                palyer(result, 0);
            } else {
                alert("Mời các bạn xem phim khác!");
            }
        },
        error: function () {
            console.log("error");
        }
    });
}

$('.bxslider').slick({
    nextArrow: $('.slick-next'),
    prevArrow: $('.slick-prev'),
    initialSlide: setVariable(current_slide, 0)
});