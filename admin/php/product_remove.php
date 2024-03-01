<?php
    include "../php/database_connection.php";
    include "../php/database_pdo.php";
    
    $result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
    $row = $result->fetch_assoc();
    if(!$row['user_admin']) {
        header("Location: ../public/index.php");
        exit();
    }

    $productID = isset($_GET['product']) ? intval($_GET['product']) : 0;

    $sql = "DELETE FROM product WHERE product_id = :productID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':productID', $productID, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../redirect.php?m=r");
    exit();
?>
