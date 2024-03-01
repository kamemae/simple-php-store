<?php
    include "../php/database_connection.php";
    include "../php/database_pdo.php";

    $result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
    $row = $result->fetch_assoc();
    if(!$row['user_admin']) {
        header("Location: ../public/index.php");
        exit();
    }

    $newName = isset($_POST['newNam']) ? htmlspecialchars($_POST['newNam'], ENT_QUOTES, 'UTF-8') : '';
    $categoryId = isset($_GET['category']) ? intval($_GET['category']) : 0;


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE category SET category_name = :newName WHERE category_id = :categoryId";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':newName', $newName, PDO::PARAM_STR);
    $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: ../redirect.php?c=1");
    exit();


?>
