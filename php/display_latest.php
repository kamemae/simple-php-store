<?php
    if (
        $result = $connect->query(
            "SELECT * FROM product order by product_id desc limit 12;"
        )
    ) {
        while ($row = $result->fetch_assoc()) {
            echo " <div class='col-4'>
                    <a href='../public/landing.php?product={$row["product_id"]}'>
                ";
            if (is_null($row["product_image_1"])) {
                echo "<img src='../images/noImage.png' alt='Brak Ustawionego Obrazu'>";
            } else {
                echo "<img src='../admin/product_images/{$row["product_image_1"]}' alt='{$row["product_name"]}'>";
            }
            echo "<h4>{$row["product_name"]}</h4><p>{$row["product_price"]} PLN</p></a></div>";
        }
        $result->free_result();
    }

?>
