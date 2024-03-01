<?php
    include "../php/database_connection.php";
    include "../php/database_pdo.php";
    
    $result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
    $row = $result->fetch_assoc();
    if(!$row['user_admin']) {
        header("Location: ../public/index.php");
        exit();
    }

    $categoryId = isset($_GET['category']) ? intval($_GET['category']) : 0;

    $result = $connect->query("SELECT * FROM category WHERE category_id = '{$categoryId}'");
    $row = $result->fetch_assoc();
    unlink("../categories_images/{$row['category_image']}");

    $sql = "DELETE FROM category WHERE category_id = :categoryId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../redirect.php?c");
    exit();
?>
