let log = document.getElementById("login");
let reg = document.getElementById("register");
let ind = document.getElementById("indicator");

function register() {
    reg.style.transform = "translateX(0px)";
    log.style.transform = "translateX(0px)";
    ind.style.transform = "translateX(105px)";
}

function login() {
    reg.style.transform = "translateX(300px)";
    log.style.transform = "translateX(300px)";
    ind.style.transform = "translateX(0px)";
}