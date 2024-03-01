let product = document.getElementById("productimg");
var smol = document.getElementsByClassName("smallimg");

smol[0].onclick = function() {
    product.src = smol[0].src;
}
smol[1].onclick = function() {
    product.src = smol[1].src;
}
smol[2].onclick = function() {
    product.src = smol[2].src;
}
smol[3].onclick = function() {
    product.src = smol[3].src;
}