<?php
include 'database_connection.php';
include 'database_pdo.php';
$result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
$row = $result->fetch_assoc();
if(!$row['user_admin']) {
    header("Location: ../public/index.php");
    exit();
}

if (isset($_FILES['newImg1']) && isset($_FILES['newImg2']) && isset($_FILES['newImg3']) && isset($_FILES['newImg4']) && isset($_POST['newNam']) && isset($_POST['newDesc']) && isset($_POST['newPrice'])) {

    function checkandhash($file) {
        global $allowedExtensions;
    
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = pathinfo($file['name'], PATHINFO_FILENAME);
    
        if (in_array($extension, $allowedExtensions)) {
            $timestamp = time();
            $randomString = uniqid();
            $hashName = md5($timestamp . $filename . $randomString);
            $hash = "{$hashName}.{$extension}";
    
            $uploadFolder = "../product_images/";
    
            move_uploaded_file($file['tmp_name'], $uploadFolder . $hash);
    
            echo $hash;
    
            list($width, $height) = getimagesize($uploadFolder . $hash);
            echo "<br>$width x $height<br><br>";
            $filename = $hash;
        }
        return $filename;
    }

    $productName = $_POST['newNam'];
    $productDescription = $_POST['newDesc'];
    $productPrice = $_POST['newPrice'];
    if(is_numeric($productPrice)) {
        if(empty($productName) || empty($productDescription) || empty($productPrice) || $productPrice < 0) {
            header("Location: ../index.php?addProduct&productNotAdded");
            exit();
        }
    
        $allowedExtensions = array('png', 'jpeg', 'jpg', 'gif', 'webp');
        $img1 = checkandhash($_FILES['newImg1']);
        $img2 = checkandhash($_FILES['newImg2']);
        $img3 = checkandhash($_FILES['newImg3']);
        $img4 = checkandhash($_FILES['newImg4']); 
        
    
        $stmt = $pdo->prepare("INSERT INTO product (product_name, product_description, product_price, product_image_1, product_image_2, product_image_3, product_image_4) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$productName, $productDescription, $productPrice, $img1, $img2, $img3, $img4]);
    
        header("Location: ../index.php?addProduct&productAdded");
        exit();
    } else {
        header("Location: ../index.php?addProduct&productNotAdded");
        exit();
    }

}
?>
