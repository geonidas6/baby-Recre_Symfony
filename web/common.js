"use strict";

var datetime = null,
        time = null,
        date = null;

var update = function () {
    date = moment(new Date());
    datetime.html(date.format('DD MMMM YYYY <br> dddd'));
    time.html(date.format('H:mm:ss'));
};
//Preloader
$('#preloader').height($(window).height() + "px");
$(window).on('load', function(){
    setTimeout(function(){
        $('body').css("overflow-y","visible");
        $('#preloader').fadeOut(400);
    }, 800);
});

$(function() {



    //Current Time
    if($('.current-date')[0] && $('.time')[0]) {
        datetime = $('.current-date');
        time = $('.time');

        update();
        setInterval(update, 1000);
    }



});