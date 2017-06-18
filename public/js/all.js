var current_time = 0;
var id_video_playing = '1';
var date = new Date();
var timeShowPopupCTA = 5; //unit minute
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

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
    return '';
}

function initCookie(cname, value, dateNumber) {
    if (getCookie(cname) == '') {
        setCookie(cname, value, dateNumber);
    }
}
function setVariable(value, defaultValue) {
    if (typeof value == 'boolean') {
        return value;
    }
    return value ? value : defaultValue;
}
$(window).scroll(function () {
    if ($(document).scrollTop() > 50) {
        $('nav').addClass('shrink');
    } else {
        $('nav').removeClass('shrink');
    }
});
$('.hide-cta-text').click(function () {
    $('.cta-box').toggle();
});
// var source = new EventSource("/api/time-on-side?time_start=" + getCookie('time_start'));
// source.onmessage = function (event) {
//     if(event.data){
//        var data = JSON.parse(event.data);
//         data.time;
//         data.isReg;
//     }
// };
initCookie("cookie_code", cookie_code, 100000);
//initCookie("time_start", date.getTime(), 1);