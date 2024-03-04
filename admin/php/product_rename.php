<?php
    include "../php/database_connection.php";
    include "../php/database_pdo.php";
    
    //admin uwu
    $result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
    $row = $result->fetch_assoc();
    if(!$row['user_admin']) {
        header("Location: ../public/index.php");
        exit();
    }

    if(empty($_POST['newNam'])) {
        header("Location: ../redirect.php?products={$_GET['product']}");
    } else {
        $newName = isset($_POST['newNam']) ? htmlspecialchars($_POST['newNam'], ENT_QUOTES, 'UTF-8') : '';
        $productID = isset($_GET['product']) ? intval($_GET['product']) : 0;
        $sql = "UPDATE product SET product_name = :newName WHERE product_id = :productID";
    
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':newName', $newName, PDO::PARAM_STR);
        $stmt->bindParam(':productID', $productID, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: ../redirect.php?products={$productID}");
        exit();
    }


?>
