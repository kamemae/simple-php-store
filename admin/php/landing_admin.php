<?php
//to mi formatowalo cos z neta
//admin uwu
if (isset($_SESSION["id"])) {
    $result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION["id"]}'");
    $row = $result->fetch_assoc();
    if ($row["user_admin"]) {
        echo "<center>
                <h2 class='title'>Edytuj Produkt</h2><br>
                <div class='col-2'>
                    <a href='?product={$_GET["product"]}&q=name' class='btn'>Zmień Nazwę</a>
                    <a href='?product={$_GET["product"]}&q=price' class='btn'>Zmień Cenę</a>
                    <a href='?product={$_GET["product"]}&q=desc' class='btn'>Zmień Opis</a>
                    <a href='?product={$_GET["product"]}&q=cat' class='btn'>Kategorie</a>
                    <a href='?product={$_GET["product"]}&q=sale' class='btn'>Zmień Zniżkę</a>
                    <a href='?product={$_GET["product"]}&q=image' class='btn'>Zmień Grafikę</a>
                    <a href='../admin/php/product_remove.php?product={$_GET["product"]}' class='btn'>Usuń</a>
                </div>  
            </center>";

        if(isset($_GET["q"])) {
            $result = $connect->query("SELECT * FROM product WHERE product_id = '{$_GET["product"]}'");
            $row = $result->fetch_assoc();
            switch ($_GET["q"]) {
                case "name":
                    echo "<center><p>Zmiana Nazwy</p></center>
                        <div class='row'>
                            <form method='POST' action='../admin/php/product_rename.php?product={$_GET["product"]}'>
                                <input type='text' name='newNam' maxlenght='128' style='width: 250px; height: 25px;' value='{$row["product_name"]}' requierd>
                                <input type='submit'  style='width: 30px; height: 25px;' value='➫'>
                            </form>
                        </div><br><br><br>";
                    break;
                case "price":
                    echo "<center><p>Zmiana Ceny</p></center>
                        <div class='row'>
                            <form method='POST' action='../admin/php/product_setprice.php?product={$_GET["product"]}'>
                                <input type='text' name='newPrice' style='width: 250px; height: 25px;' value='{$row["product_price"]}' requierd>
                                <input type='submit'  style='width: 30px; height: 25px;' value='➫'>
                            </form>
                        </div><br><br><br>";
                    break;
                case "desc":
                    echo "<center><p>Zmiana Opisu</p></center>
                        <div class='row'>
                            <form method='POST' action='../admin/php/product_setdescription.php?product={$_GET["product"]}'>
                                <input type='text' name='newDesc' style='width: 250px; height: 25px;' value='{$row["product_description"]}' requierd>
                                <input type='submit'  style='width: 30px; height: 25px;' value='➫'>
                            </form>
                    </div><br><br><br>";
                    break;
                case "cat":
                    echo "<div><div><center><p>Dodaj do kategorii</p></center><div class='row'><form method='POST' action='../admin/php/categories_set.php?product={$_GET["product"]}'><select name='add'>";
                    $result = $connect->query("SELECT category_id, category_name FROM category");
                    if ($result->num_rows > 0) while ($row = $result->fetch_assoc()) echo "<option value='{$row["category_id"]}'>{$row["category_name"]}</option>";
                    echo "</select><input type='submit' style='width: 30px; height: 25px;' value='➫'></form></div></div><br><br>
                        <div><center><p>Usuń z kategorii</p></center><div class='row'><form method='POST' action='../admin/php/categories_unset.php?product={$_GET["product"]}'><select name='rem'>";
                    $result = $connect->query("SELECT categories.categories_id, categories.category_id, category.category_name FROM category LEFT JOIN categories ON category.category_id = categories.category_id WHERE product_id = {$_GET["product"]}");
                    if ($result->num_rows <= 0) echo "<option>Produkt nie znajduje się w żadnej kategorii</option></select><input type='submit' disabled style='width: 30px; height: 25px;' value='➫'>";
                    else {
                        while ($row = $result->fetch_assoc()) echo "<option value='{$row["categories_id"]}'>{$row["category_name"]}</option>";
                        echo "</select><input type='submit' style='width: 30px; height: 25px;' value='➫'>";
                    }
                    echo "</form></div></div><br><br><br>";

                    break;
                case "sale":
                    echo "<center><p>Zmiana Zniżki</p></center>
                        <div class='row'>
                            <form method='POST' action=''>
                                <input type='text' maxlenght='128' style='width: 250px; height: 25px;' value='zrobi sie pozniej' requierd>
                                <input type='submit' diabled style='width: 30px; height: 25px;' value='➫'>
                            </form>
                        </div><br><br><br>
                    ";
                    break;
                case "image":
                    $result = $connect->query("SELECT * FROM product");
                    $result->fetch_assoc();
                    echo "<center><p>Zmiana Grafiki</p></center><br><center>";

                    if(!is_null($row['product_image_1'])) echo "<img class='smallimg' src='../admin/product_images/{$row['product_image_1']}' width='200px'>";
                    else echo "<img class='smallimg' src='../images/noImage.png' width='200px'>";
                    echo "
                        <form method='POST' action='../admin/php/product_setimage.php?select=1&product={$row['product_id']}' enctype='multipart/form-data'>
                            <input type='file' name='img' style='width: 270px; height: 25px; border: none' required><br>
                            <input type='hidden' name='{$row['product_image_1']}'>
                            <input type='submit' value='Ustaw' class='btn' style='max-width: 100px'>
                        </form><hr style='max-width: 300px'><br>
                    ";

                    if(!is_null($row['product_image_2'])) echo "<img class='smallimg' src='../admin/product_images/{$row['product_image_2']}' width='200px'>";
                    else echo "<img class='smallimg' src='../images/noImage.png' width='200px'>";
                    echo "
                    <form method='POST' action='../admin/php/product_setimage.php?select=2&product={$row['product_id']}' enctype='multipart/form-data'>
                            <input type='file' name='img' style='width: 270px; height: 25px; border: none' required><br>
                            <input type='hidden' name='{$row['product_image_2']}'>
                            <input type='submit' value='Ustaw' class='btn' style='max-width: 100px'>
                        </form><hr style='max-width: 300px'><br>
                    ";

                    if(!is_null($row['product_image_3'])) echo "<img class='smallimg' src='../admin/product_images/{$row['product_image_3']}' width='200px'>";
                    else echo "<img class='smallimg' src='../images/noImage.png' width='200px'>";
                    echo "
                    <form method='POST' action='../admin/php/product_setimage.php?select=3&product={$row['product_id']}' enctype='multipart/form-data'>
                            <input type='file' name='img' style='width: 270px; height: 25px; border: none' required><br>
                            <input type='hidden' name='{$row['product_image_3']}'>
                            <input type='submit' value='Ustaw' class='btn' style='max-width: 100px'>
                        </form><hr style='max-width: 300px'><br>
                    ";

                    if(!is_null($row['product_image_4'])) echo "<img class='smallimg' src='../admin/product_images/{$row['product_image_4']}' width='200px'>";
                    else echo "<img class='smallimg' src='../images/noImage.png' width='200px'>";
                    echo "
                    <form method='POST' action='../admin/php/product_setimage.php?select=4&product={$row['product_id']}' enctype='multipart/form-data'>
                            <input type='file' name='img' style='width: 270px; height: 25px; border: none' required><br>
                            <input type='hidden' name='{$row['product_image_4']}'>
                            <input type='submit' value='Ustaw' class='btn' style='max-width: 100px'>
                        </form><hr style='max-width: 300px'><br>
                    </div></center><br><br><br>";
                    break;
                default:
                    break;
            }
        }
    }
}
?>
