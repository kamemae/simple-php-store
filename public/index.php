<?php include "../php/database_connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cool Piekarnia | Strona Główna</title>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="../js/toggler.js" defer></script>
</head>
<body>
    <header>
    <?php include "../php/load_header.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-2"><h1>Pieczemy Chleb</h1>
                    <p>Pieczenie chleba jest naszą pasją od wielu lat!<br>Postanowiliśmy więc wkroczyć na rynek internetowy!<br>Mamy nadzieję że nasze wypieki które od teraz będzie można zamówić<br>przez internet z dostawą do domu będą cieszyć tak jak zawsze!</p>
                    <a href="../public/products.php" class="btn">Przeglądaj Produkty</a> <!~~serio nie wiem co tu dodać dlatego koty~~!>
                </div>
                <div class="col-2"><img src="../images/baker.png" alt=" "></div>
            </div>
        </div>
    </header>
    <br>
    <div class="small-container"><h2 class="title">Losowe Produkty</h2>
        <div class="row"> <?php include "../php/display_featured.php"; ?></div>
        <br><h2 class="title">Najnowsze Produkty</h2>
        <div class="row"><?php include "../php/display_latest.php"; ?></div>
    </div>
    <div class="categories">
    <h2 class="title">Losowe Kategorie</h2><br><div class="small-container"><div class="row"><?php include "../php/categories_random.php"; ?></div></div></div>
    <?php include "../php/landing_random.php"; ?>
    <?php include "../php/load_footer.php"; ?>
</body>
</html>