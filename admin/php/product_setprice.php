<?php
    include "../php/database_connection.php";

    //czy admin
    $result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
    $row = $result->fetch_assoc();
    if(!$row['user_admin']) {
        header("Location: ../public/index.php");
        exit();
    }


    $newPrice = filter_input(INPUT_POST, 'newPrice', FILTER_VALIDATE_FLOAT);
    if($newPrice !== false) {
        $productID = $_GET['product'];
    
        $pdo = new PDO("mysql:host=localhost;dbname=piekarnia", "root", "");
        $sql = 'UPDATE product SET product_price = :newPrice WHERE product_id = :productID';
    
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':newPrice', $newPrice, PDO::PARAM_STR); 
        $stmt->bindParam(':productID', $productID, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: ../redirect.php?products={$_GET['product']}");
    } else {
        header("Location: ../redirect.php?products={$_GET['product']}");
    }

?>