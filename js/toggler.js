let mi = document.getElementById("menuitems");
mi.style.maxHeight = "0px";

function toggler() {
    if(mi.style.maxHeight == "0px") mi.style.maxHeight = "200px";
    else mi.style.maxHeight = "0px";
}