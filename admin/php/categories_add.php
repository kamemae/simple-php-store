<?php
include 'database_connection.php';

//czy admin
$result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
$row = $result->fetch_assoc();
if (!$row['user_admin']) {
    header("Location: ../redirect.php?d");
    exit();
}

if (isset($_FILES['newImg']) && isset($_POST['newNam'])) {
    $newName = $_POST["newNam"];
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
        
        echo $hash;


        list($width, $height) = getimagesize($uploadFolder . $hash);    
        echo "<br>$width x $height";

        if($width == $height) {
            $sql = "INSERT INTO category (category_name, category_image) VALUES ('$newName', '$hash')";
            mysqli_query($connect, $sql);
            header("Location: ../index.php?addCategory&succ");
            exit();
        } else {
            unlink($uploadFolder . $hash);
            header("Location: ../index.php?addCategory&error=imgsize");
            exit();
        }
    }
}
?>
