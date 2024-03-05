<?php
include "../php/database_connection.php";
if (!$_SESSION['id']) {
    header("Location: ../public/login.php");
    exit();
}

if(isset($_GET['product'])) {
    if (!empty($_GET['product']) && is_numeric($_GET['product'])) { //jest w koszyku
        $deleteQuery = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
        $deleteStmt = $connect->prepare($deleteQuery);
        $deleteStmt->bind_param("ii", $_SESSION['id'], $_GET['product']);
        $deleteStmt->execute();
        
        header("Location: ../public/cart.php");
        exit();
    } else { //nie ma w koszyku
        header("Location: ../");
        exit();
    }
} else if(isset($_GET['productRem'])) {
    if(!empty($_GET['productRem'])) {

        $cartQuery = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
        $cartStmt = $connect->prepare($cartQuery);
        $cartStmt->bind_param("ii", $_SESSION['id'], $_GET['productRem']);
        $cartStmt->execute();
        $cartResult = $cartStmt->get_result();
        if ($cartResult->num_rows > 0) { //jest w
            $inCartItem = $cartResult->fetch_assoc();
            if($inCartItem['cart_quantity'] > 1) {
                $newQuantity = $inCartItem['cart_quantity'] - 1;
                $updateCart = "UPDATE cart SET cart_quantity = ? WHERE user_id = ? AND product_id = ?";
                $updateCart = $connect->prepare($updateCart);
                $updateCart->bind_param("iii", $newQuantity, $_SESSION['id'], $_GET['productRem']);
                $updateCart->execute();
            } else {
                $deleteQuery = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
                $deleteStmt = $connect->prepare($deleteQuery);
                $deleteStmt->bind_param("ii", $_SESSION['id'], $_GET['productRem']);
                $deleteStmt->execute();
            }

    
        } else { //nie ma
            $insertToCart = "INSERT INTO cart (user_id, product_id, cart_quantity) VALUES (?, ?, ?)";
            $insertToCart = $connect->prepare($insertToCart);
            $insertToCart->bind_param("iii", $_SESSION['id'], $_GET['productRem'], 1);
            $insertToCart->execute();
        }
        header("Location: ../public/cart.php");
        exit();
    }
} else {
    header("Location: ../");
    exit();
}

?>
