<?php
include 'database_connection.php';
//czy admin
$result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
$row = $result->fetch_assoc();
if (!$row['user_admin']) {
    header("Location: ../redirect.php?d");
    exit();
}

if(isset($_POST['add'])) {
    $category_id = isset($_POST['add']) ? intval($_POST['add']) : 0; 
    $product_id = isset($_GET['product']) ? intval($_GET['product']) : 0; 
    $sql = "INSERT INTO categories (category_id, product_id) VALUES (?, ?)";
    $stmt = $connect->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ii", $category_id, $product_id);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: ../redirect.php?products=$product_id");
}
?>
