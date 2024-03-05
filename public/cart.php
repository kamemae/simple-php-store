<?php 
    include "../php/database_connection.php";
    if(!$_SESSION['id']) header("Location: ../public/login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cool Piekarnia | Koszyk</title>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/toggler.js" defer></script>
</head>
<body>
    <?php include "../php/load_header.php"; ?>
    <div class="small-container cart-page">
        <table><tr><th>Nazwa Produktu</th><th>Ilość</th><th></th><th>Cena</th></tr>
            <?php
                $cartQuery = "SELECT * from cart join product using(product_id) where user_id = ?";
                $cartStmt = $connect->prepare($cartQuery);
                $cartStmt->bind_param("i", $_SESSION['id']);
                $cartStmt->execute();
                $cartResult = $cartStmt->get_result();
                $total = 0;

                if ($cartResult->num_rows > 0) {
                    while ($row = $cartResult->fetch_assoc()) {
                        echo "<tr><td><div class='cart-info'> <a href='../public/landing.php?product={$row['product_id']}'>";
                        if($row['product_image_1'] != null) echo "<img src='../admin/product_images/{$row['product_image_1']}' alt='{$row['product_name']}'>";
                        else echo "<img src='../images/noImage.png' alt='{$row['product_name']}'>";
                        echo "<div><p>{$row['product_name']}</p><small>{$row['product_price']} PLN / szt.</small><br><br><a href='../php/cart_remove.php?product={$row['product_id']}'>Usuń</a></div></a></div></td><td>
                            <a class='minus fa-regular fa-square-minus' href='../php/cart_remove.php?productRem={$row['product_id']}'></a> {$row['cart_quantity']} szt. <a class='plus fa-regular fa-square-plus' href='../php/cart_add.php?product={$row['product_id']}'></a></td><td></td><td>";
                        $total += $row['cart_quantity']*$row['product_price'];
                        echo $row['cart_quantity']*$row['product_price'];
                        echo "PLN </td></tr>";
                    }
                    echo "</table><div class='total'><table><tr><td>Koszyk</td><td>$total PLN</td></tr>";
                    echo "<tr><td>Dostawa</td><td>14.99 PLN</td> </tr>";
                    $total += 14.99;
                    $tmpTotal = $total;
                    $tmpTotal -= intval($total);
                    if($tmpTotal < 0.1) $total = $total."0";
                    echo "<tr><td>Całość</td><td>$total PLN</td></tr></table></div>";
                } else echo "</table><center>Pusty koszyk bratku</center>";

                $cartResult->close();
                $cartStmt->close();
            ?>
    </div>
    <?php include "../php/load_footer.php"; ?>
</body>
</html>