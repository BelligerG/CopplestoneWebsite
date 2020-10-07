
var total_time = 2000; //ms
var time_interval = 10; //ms
var opacity_interval = (1/total_time) * time_interval;

function fade_in_image() {
    let welcome_window = document.getElementById("welcome");
    let opacity = 0;
    let timer = setInterval(function() {
        if (opacity > 1){
            clearInterval(timer);
        }
        welcome_window.style.opacity = opacity;
        opacity += opacity_interval;
    }, time_interval);
}

window.addEventListener('load', fade_in_image, false);