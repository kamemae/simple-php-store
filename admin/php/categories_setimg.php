<?php
include 'database_connection.php';

//czy admin
$result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
$row = $result->fetch_assoc();
if (!$row['user_admin']) {
    header("Location: ../redirect.php?d");
    exit();
}

if (isset($_FILES['newImg'])) {

    //UPDATE `category` SET `category_image` = 'despacito' WHERE `category`.`category_id` = 24;
    $filename = strtolower($_FILES['newImg']['name']);

    $extension = explode('.', $filename);
    $extension = end($extension);

    $allowedExtensions = array('png', 'jpeg', 'jpg', 'gif');
    if(in_array($extension, $allowedExtensions)) {
        $timestamp = time();
        $hashName = md5($timestamp . $filename);
        $hash = "{$hashName}.{$extension}";

        $uploadFolder = "../categories_images/";
        move_uploaded_file($_FILES['newImg']['tmp_name'], $uploadFolder . $hash);
        
        list($width, $height) = getimagesize($uploadFolder . $hash);    

        if($width == $height) {
            $sql = "SELECT category_image FROM category where category_id = {$_GET['category']}";
            unlink($uploadFolder . $sql);

            $sql = "UPDATE category SET category_image = '{$hash}' WHERE category_id = {$_GET['category']};";
            mysqli_query($connect, $sql);

            header("Location: ../redirect.php?catimg");
            exit();
        } else {
            unlink($uploadFolder . $hash);
            header("Location: ../redirect.php?catimg");
            exit();
        }
    }
}
?>
