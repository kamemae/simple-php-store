<?php
include 'database_connection.php';

//adam to ty?
$result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
$row = $result->fetch_assoc();
if (!$row['user_admin']) {
    header("Location: ../redirect.php?d");
    exit();
}

if (isset($_FILES['newImg'])) {
    $filename = strtolower($_FILES['newImg']['name']);
    
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $allowedExtensions = array('png', 'jpeg', 'jpg', 'gif');

    if (in_array($extension, $allowedExtensions)) {
        $timestamp = time();
        $hashName = md5($timestamp . $filename);
        $hash = "{$hashName}.{$extension}";

        $uploadFolder = "../categories_images/";
        move_uploaded_file($_FILES['newImg']['tmp_name'], $uploadFolder . $hash);
        
        list($width, $height) = getimagesize($uploadFolder . $hash);    

        if ($width > 0 && $height > 0) {
            $category_id = mysqli_real_escape_string($connect, $_GET['category']);
            $result = $connect->query("SELECT category_image FROM category WHERE category_id = {$category_id}");
            $row = $result->fetch_assoc();
            $currentImage = $row['category_image'];
            $sql = "UPDATE category SET category_image = '{$hash}' WHERE category_id = {$category_id}";
            mysqli_query($connect, $sql);
            if (!empty($currentImage)) { unlink($uploadFolder . $currentImage); }
            header("Location: ../redirect.php?catimg");
            exit();
        } else {
            unlink($uploadFolder . $hash);
            header("Location: ../redirect.php?catimg");
            exit();
        }
    }
}

//tu mi kod poprawił chatgpt taka dobra mordka
?>
