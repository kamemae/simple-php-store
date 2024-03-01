<?php
    $result = $connect->query("SELECT * FROM product WHERE product_id = '{$_GET['product']}'");
    $row = $result->fetch_assoc();
    echo "<title>Cool Piekarnia | {$row['product_name']}</title>";
?>