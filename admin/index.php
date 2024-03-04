<?php
    include "../php/database_connection.php";
    include "../php/account_loginplz.php";
    
    $result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
    $row = $result->fetch_assoc();
    if(!$row['user_admin']) {
        header("Location: ../public/account.php");
        exit();
    }
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
<header>
        <div class="container">
            <?php include "../php/load_header.php"; ?>
            <div class="row">
                <div class="col-2">
                    <h1>
                        Witaj <?php echo $_SESSION['name']; ?>!
                    </h1>
                    <p>
                        W sumie to nic tu nie zrobisz, ale gratuluje, serio,<br>
                        nie każdy jest tak utalentowany jak ty, wpisać admin admin <br>
                        serio, godne podziwu, ale tak szczerze, to po co ci to bylo? <br>
                        Nic z tym faktem nie zrobisz, ale jak chcesz to mozesz sie wylogowac<br>
                    </p>
                    <a href='../php/user_logout.php' class='btn'>Wyloguj sie</a>
                </div>
                <div class="col-2">
                    <img src="../images/baker.png" alt=" ">
                </div>
            </div>
        </div>
    </header>

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
                    <h2 class="title">Menu</h2><br>
                    <div class="col-3">
                        <a href='?addCategory' class='btn'>Dodaj Kategorie</a>
                        <a href='?addProduct' class='btn'>Dodaj Produkt</a>
                    </div>
                </div>
            </div>
        </div>
        <?php

            if(isset($_GET['addCategory'])) {
                echo "
                    <center><p>Dodawanie Kategorii</p></center>
                    <div class='row'>
                        <form method='POST' action='../admin/php/categories_add.php' enctype='multipart/form-data'>";
                        if(isset($_GET['error'])) {
                            if($_GET['error'] == 'imgsize') {
                                echo "<p class='error' style='color: red;'>Obraz powinien być kwadratem!</p>";
                            }
                        }
                        if(isset($_GET['succ'])) {
                            echo "<p class='error' style='color: green;'>Dodano Pomyślnie!</p>";
                        }
                        echo "
                            <input type='text' name='newNam' maxlenght='128' style='width: 250px; height: 25px;' placeholder='Nazwa Kategorii' required><br>
                            <input type='file' name='newImg' style='width: 270px; height: 25px; border: none' required><br>
                            <input type='submit' class='btn' style='width: 95%;' value='Dodaj Kategorię'>
                        </form>
                    </div><br><br><br>
                ";
            } else if(isset($_GET['addProduct'])) {
                echo "
                    <center><h4>Dodawanie Produktu</h4></center>
                    <p>Musisz dodać cztery obrazy<br>Zdjęcie musi być kwadratem!</p>
                    <div class='row'>
                        <form method='POST' action='../admin/php/product_add.php' enctype='multipart/form-data'>
                            <input type='text' name='newNam' maxlenght='128' style='width: 250px; height: 25px;' placeholder='Nazwa Produktu' required><br>
                            <input type='text' name='newDesc' style='width: 250px; height: 25px;' placeholder='Opis Produktu' required><br>
                            <input type='text' name='newPrice' style='width: 250px; height: 25px;' placeholder='Cena Produktu' required><br><br>
                            <p>Zdjęcia</p>
                            <input type='file' name='newImg1' style='width: 270px; height: 25px; border: none' required><br>
                            <input type='file' name='newImg2' style='width: 270px; height: 25px; border: none' required><br>
                            <input type='file' name='newImg3' style='width: 270px; height: 25px; border: none' required><br>
                            <input type='file' name='newImg4' style='width: 270px; height: 25px; border: none' required><br>
                            <input type='submit' class='btn' style='width: 95%;' value='Dodaj Produkt'>
                        </form>
                    </div><br><br><br>
                ";
            }
        ?>
    </center>
    <?php include "../php/load_footer.php"; ?>
</body>
</html>