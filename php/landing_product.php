<?php 
function doesNotExist() { header("Location: ../resources/productdoesnotexist.php"); }

if(isset($_GET['product'])) {
    if(is_numeric($_GET['product'])) {
        $result = $connect->query("SELECT * FROM product WHERE product_id = '{$_GET['product']}'");
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo "<div class='small-container single-product'><div class='row'><div class='col-2'>";
            if(is_null($row['product_image_1'])) {
                echo "<img src='../images/noImage.png' width='100%' id='productimg'>";
            } else {
                echo "<img src='../admin/product_images/{$row['product_image_1']}' width='100%' id='productimg'>";
            }
            echo "<div class='small-img-row'>";

            if(is_null($row['product_image_1'])) {
                echo "<div class='small-img-col'><img src='../images/noImage.png' alt='' width='100%' class='smallimg'></div>";
            } else {
                echo "<div class='small-img-col'><img src='../images/{$row['product_image_1']}' alt='' width='100%' class='smallimg'></div>";
            }

            if(is_null($row['product_image_2'])) {
                echo "<div class='small-img-col'><img src='../images/noImage.png' alt='' width='100%' class='smallimg'></div>";
            } else {
                echo "<div class='small-img-col'><img src='../images/{$row['product_image_2']}' alt='' width='100%' class='smallimg'></div>";
            }

            if(is_null($row['product_image_3'])) {
                echo "<div class='small-img-col'><img src='../images/noImage.png' alt='' width='100%' class='smallimg'></div>";
            } else {
                echo "<div class='small-img-col'><img src='../images/{$row['product_image_3']}' alt='' width='100%' class='smallimg'></div>";
            }

            if(is_null($row['product_image_4'])) {
                echo "<div class='small-img-col'><img src='../images/noImage.png' alt='' width='100%' class='smallimg'></div>";
            } else {
                echo "<div class='small-img-col'><img src='../images/{$row['product_image_4']}' alt='' width='100%' class='smallimg'></div>";
            }
            echo "</div></div>
                <div class='col-2'>
                    <h1>{$row['product_name']}</h1>
                    <h4>{$row['product_price']} PLN</h4>
                    <input type='number' name='' id='' value='1' min='1' max='10'> szt.<br>
                    <a href='' class='btn'>Dodaj Do Koszyka</a>
                    <h3>O Produkcie <i class='fa-solid fa-indent'></i></h3><br>
                    <p>{$row['product_description']}</p>
                </div>
            </div></div>
            <script src='../js/smallimg.js'></script>";
            
        } else {
            doesNotExist();
        }
    } else {
        doesNotExist();
    }
} else {
     doesNotExist();
}
?>