<?php
    $result = $connect->query("SELECT * FROM product ORDER BY RAND() LIMIT 1");
    
    if ($result) {
        $row = $result->fetch_assoc();
        echo "<div class='offer'><div class='small-container'><div class='row'><div class='col-2'>";

        if (is_null($row["product_image_1"])) {
            echo "<img src='../images/noImage.png' alt='Brak Ustawionego Obrazu' class='offerimg'>";
        } else {
            echo "<img src='../public/category_images/{$row["category_image"]} alt='{$row["category_name"]}' class='offerimg'>";
        }

        echo "</div><div class='col-2'>
            <p>Losowy produkt!</p>
            <h1>{$row["product_name"]}</h1>
            <small>{$row["product_description"]}</small><br>
            <a href='../public/landing.php?product={$row["product_id"]}' class='btn'>Kup Teraz!</a>
        </div></div></div></div>";

    } else {
        echo "Przepraszamy, nie mogliśmy wylosować produktu tym razem";
    }
?>

