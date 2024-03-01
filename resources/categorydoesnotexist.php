<?php include "../php/database_connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cool Piekarnia | Błąd!</title>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="../js/toggler.js" defer></script>
</head>
<body>
    <header style="padding-bottom: 200px">
        <div class="container">
        <?php include "../php/load_header.php"; ?>
            <div class="row">
                <div class="col-2">
                    <img src="../images/error.png" alt=" ">
                </div>
                <div class="col-2">
                    <h1>
                        Taka kategoria nie istnieje
                    </h1>
                    <p>
                        Widocznie zaszedl jakiś problem
                    </p>
                    <a href="../public/" class="btn">Powrót Na Strone Główną</a>
                </div>
            </div>
        </div>
    </header>
    <?php include "../php/load_footer.php"; ?>
</body>
</html>