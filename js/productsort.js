function renderProducts(sorting) {
    switch (sorting) {
        case "random":
            products.sort(() => Math.random() - 0.5);
            break;
        case "price_asc":
            products.sort((a, b) => a.price - b.price);
            break;
        case "price_desc":
            products.sort((a, b) => b.price - a.price);
            break;
        case "name_asc":
            products.sort((a, b) => a.name.localeCompare(b.name));
            break;
        default:
            products.sort((a, b) => a.id - b.id);
    }
    displayProducts(products);
}

function displayProducts(products) {
    var productContainer = $(".elements"); 
    productContainer.find(".col-4").remove(); 
    for(var i = 0; i < products.length; i++) {
        var product = products[i];
        var productHTML = `<div class='col-4'>
                <a href='../public/landing.php?product=${product.id}'>
                    <img src='../images/chlep.jpg' alt='chlep' />
                    <h4>${product.name}</h4>
                    <p>${product.price} PLN</p> 
                </a>
            </div>`;
        productContainer.append(productHTML);
    }
}

renderProducts("random");

$("#sortingSelect").on("change", function () {
    var selectedSorting = $(this).val();
    renderProducts(selectedSorting);
});