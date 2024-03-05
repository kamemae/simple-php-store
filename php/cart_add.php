<?php
include "../php/database_connection.php";
if (!$_SESSION['id']) {
    header("Location: ../public/login.php");
    exit();
}
echo $_POST['product'];
echo "<br>";
echo $_POST['howMany'];

if(isset($_POST['product'], $_POST['howMany'])) {
    if (!empty($_POST['product']) && !empty($_POST['howMany']) && is_numeric($_POST['howMany']) && is_numeric($_POST['product'])) {
    
        $cartQuery = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
        $cartStmt = $connect->prepare($cartQuery);
        $cartStmt->bind_param("ii", $_SESSION['id'], $_POST['product']);
        $cartStmt->execute();
        $cartResult = $cartStmt->get_result();
    
        if ($cartResult->num_rows > 0) { //jest w
            $inCartItem = $cartResult->fetch_assoc();
            $newQuantity = $inCartItem['cart_quantity'] + $_POST['howMany'];
            $updateCart = "UPDATE cart SET cart_quantity = ? WHERE user_id = ? AND product_id = ?";
            $updateCart = $connect->prepare($updateCart);
            $updateCart->bind_param("iii", $newQuantity, $_SESSION['id'], $_POST['product']);
            $updateCart->execute();
    
        } else { //nie ma
            $insertToCart = "INSERT INTO cart (user_id, product_id, cart_quantity) VALUES (?, ?, ?)";
            $insertToCart = $connect->prepare($insertToCart);
            $insertToCart->bind_param("iii", $_SESSION['id'], $_POST['product'], $_POST['howMany']);
            $insertToCart->execute();
    
        }
    
        header("Location: ../public/landing.php?product={$_POST['product']}");
        exit(); 
    
    } else {
        header("Location: ../");
        exit();
    }
} else if(isset($_GET['product'])) {
    if (!empty($_GET['product']) && is_numeric($_GET['product'])) {
    
        $cartQuery = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
        $cartStmt = $connect->prepare($cartQuery);
        $cartStmt->bind_param("ii", $_SESSION['id'], $_GET['product']);
        $cartStmt->execute();
        $cartResult = $cartStmt->get_result();
    
        if ($cartResult->num_rows > 0) { //jest w
            $inCartItem = $cartResult->fetch_assoc();
            $newQuantity = $inCartItem['cart_quantity'] + 1;
            $updateCart = "UPDATE cart SET cart_quantity = ? WHERE user_id = ? AND product_id = ?";
            $updateCart = $connect->prepare($updateCart);
            $updateCart->bind_param("iii", $newQuantity, $_SESSION['id'], $_GET['product']);
            $updateCart->execute();
    
        } else { //nie ma
            $insertToCart = "INSERT INTO cart (user_id, product_id, cart_quantity) VALUES (?, ?, ?)";
            $insertToCart = $connect->prepare($insertToCart);
            $insertToCart->bind_param("iii", $_SESSION['id'], $_GET['product'], 1);
            $insertToCart->execute();
    
        }
    
        header("Location: ../public/cart.php");
        exit(); 
    
    } else {
        header("Location: ../");
        exit();
    }
} else {
    header("Location: ../");
    exit();
}


?>
