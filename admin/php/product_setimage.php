<?php
include 'database_connection.php';
include 'database_pdo.php';
$result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
$row = $result->fetch_assoc();
if (!$row['user_admin']) {
    header("Location: ../public/index.php");
    exit();
}

$product = isset($_GET['product']) ? $_GET['product'] : null;
if (isset($_FILES['img']) && $product != null) {
    $stmt = $pdo->prepare("SELECT * FROM product WHERE product_id = ?");
    $stmt->execute([$product]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product) {
        function checkAndHash($file)
        {
            global $allowedExtensions;
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = pathinfo($file['name'], PATHINFO_FILENAME);
            if (in_array($extension, $allowedExtensions)) {
                $timestamp = time();
                $randomString = uniqid();
                $hashName = md5($timestamp . $filename . $randomString);
                $hash = "{$hashName}.{$extension}";
                $uploadFolder = "../product_images/";
                if (move_uploaded_file($file['tmp_name'], $uploadFolder . $hash)) {
                    echo $hash;
                    list($width, $height) = getimagesize($uploadFolder . $hash);
                    echo "<br>$width x $height<br><br>";
                    return $hash;
                } else {
                    echo "File upload failed!";
                }
            }
            return false;
        }

        function removeOldImage($product, $select)
        {
            $uploadFolder = "../product_images/";
            switch ($select) {
                case 1:
                    if (!empty($product['product_image_1'])) {
                        unlink($uploadFolder . $product['product_image_1']);
                    }
                    break;
                case 2:
                    if (!empty($product['product_image_2'])) {
                        unlink($uploadFolder . $product['product_image_2']);
                    }
                    break;
                case 3:
                    if (!empty($product['product_image_3'])) {
                        unlink($uploadFolder . $product['product_image_3']);
                    }
                    break;
                case 4:
                    if (!empty($product['product_image_4'])) {
                        unlink($uploadFolder . $product['product_image_4']);
                    }
                    break;
            }
        }

        $allowedExtensions = array('png', 'jpeg', 'jpg', 'gif', 'webp');
        $img = checkAndHash($_FILES['img']);
        if ($img) {
            $select = isset($_GET['select']) ? intval($_GET['select']) : 0;
            removeOldImage($product, $select);

            switch ($select) {
                case 1:
                    $stmt = $pdo->prepare("UPDATE product SET product_image_1 = ? WHERE product_id = ?");
                    $stmt->execute([$img, $product['product_id']]);
                    break;
                case 2:
                    $stmt = $pdo->prepare("UPDATE product SET product_image_2 = ? WHERE product_id = ?");
                    $stmt->execute([$img, $product['product_id']]);
                    break;
                case 3:
                    $stmt = $pdo->prepare("UPDATE product SET product_image_3 = ? WHERE product_id = ?");
                    $stmt->execute([$img, $product['product_id']]);
                    break;
                case 4:
                    $stmt = $pdo->prepare("UPDATE product SET product_image_4 = ? WHERE product_id = ?");
                    $stmt->execute([$img, $product['product_id']]);
                    break;
                default:
                    header("Location: ../../public/landing.php?product={$product['product_id']}");
                    exit();
            }
        }

        header("Location: ../../public/landing.php?product={$product['product_id']}");
        exit();
    } else {
        header("Location: ../../public/landing.php?product={$product}");
    }
} else {
    echo $product;
    exit();
}
?>
