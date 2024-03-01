<?php 
    echo 
    "<div class='container'>
        <div class='navbar'>
            <div class='logo'>
                <img src='../images/logo.gif' alt='logo' class='logo' />
            </div>
            <nav>
                <ul id='menuitems'>
                    <li>
                        <a href='../public/''><i class='fa-solid fa-house'></i> Strona Główna</a>
                    </li>
                    <li>
                        <a href='../public/products.php'><i class='fa-solid fa-bread-slice'></i> Produkty</a>
                    </li>
                    <li>
                        <a href='../public/categories.php'><i class='fa-solid fa-layer-group'></i> Kategorie</a>
                    </li>
                    <li></li>
                    <li>
                        <a href='../public/cart.php'><i class='fa-solid fa-cart-shopping'></i> Koszyk</a>
                    </li>
                    <li>
                        <a href='../public/account.php'><i class='fa-solid fa-user'></i> Konto</a>
                    </li>
                </ul>
                <i class='menuicon fa-solid fa-bars' onclick='toggler()'></i>
            </nav>
        </div>
    </div> ";
?>