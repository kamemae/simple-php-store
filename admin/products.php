<?php
    include "../php/database_connection.php";
    
    /*
    $result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
    $row = $result->fetch_assoc();
    if(!$row['user_admin']) {
        header("Location: ../public/account.php");
        exit();
    }
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../php/user_title.php"; ?>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="../js/toggler.js" defer></script>
</head>
<body>
    <?php include "../php/load_header.php"; ?>
    <div class="small-container">
        <div class="container">
            <div class='row'>
                <?php
                    if($result = $connect->query("SELECT * FROM product;")) {
                        while($row = $result->fetch_assoc()) {
                            echo "
                                <div class='col-4' width=10px>
                                    <a href='../public/landing.php?product={$row['product_id']}'>
                                        <img src='../images/chlep.jpg' alt='chlep' />
                                        <h4>{$row['product_name']}</h4>
                                        <p>{$row['product_price']} PLN</p>
                                    </a>
                                </div>
                            ";
                        }
                        $result->free_result();
                    }

                ?>
            </div>
        </div>
    </div>

    
    <center style="padding: 100px;">
        <div class="row">
            <div class="col-2">
                <h1>Zarządzanie sklepem</h1>
                <div class="col-2">
                <h2 class="title">Menu Zamówień</h2><br>
                    <div class="col-3">
                        <a href='#' class='btn'>Przychodzące</a>
                        <a href='#' class='btn'>Nadane</a>
                        <a href='#' class='btn'>Wszystkie</a>
                    </div><br><br>
                </div>
                <div class="col-2">
                <h2 class="title">Menu Produktów</h2><br>
                    <div class="col-3">
                        <a href='../admin/products.php?mode=add' class='btn'>Dodawanie</a>
                        <a href='#' class='btn'>Modyfikacja</a>
                        <a href='#' class='btn'>Usuwanie</a>
                        <a href='#' class='btn'>Wyprzedaże</a>
                    </div><br><br>
                </div>
                <div class="col-2">
                <h2 class="title">Menu Kategorii</h2><br>
                    <div class="col-3">
                        <a href='../admin/categories.php?mode=add' class='btn'>Dodawanie</a>
                        <a href='../admin/categories.php?mode=mod' class='btn'>Modyfikacja</a>
                        <a href='../admin/categories.php?mode=del' class='btn'>Usuwanie</a>
                    </div><br><br>
                </div>


            </div>
        </div>
    </center>

    <?php include "../php/load_footer.php"; ?>
</body>
</html>