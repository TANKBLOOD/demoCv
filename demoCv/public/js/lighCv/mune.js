var mune = document.getElementsByClassName("panel-mune")[0];
var btn = document.getElementById("bars-icon");

btn.onclick = function() {
    mune.classList.toggle("visible");
}