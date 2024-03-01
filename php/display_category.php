<?php
    if($result = $connect->query("SELECT * FROM category;")) {
        while($row = $result->fetch_assoc()) {
            echo "
                <div class='col-4'>
                    <a href='../public/categories-view.php?category={$row['category_id']}'>
            ";
            if(is_null($row['category_image'])) {
                echo "<img src='../images/noImage.png' alt='Brak Ustawionego Obrazu'>";
            } else {
                echo "<img src='../admin/categories_images/{$row['category_image']}' alt='{$row['category_name']}'>";
            }
            echo "<h4>{$row['category_name']}</h4>
                    </a>
                </div>
            ";
        }
        $result->free_result();
    }
?>


