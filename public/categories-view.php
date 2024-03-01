<?php include "../php/database_connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include "../php/category_title.php"; ?>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/toggler.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "../php/load_header.php"; ?>
    <br />

    <div class="small-container">
        <div class="row row-2">
            <h2>Produkty z <?php echo $row['category_name']; ?></h2>
        </div>
            <div class="row elements"></div>
            <div class="row">
                <?php include "../php/category_products.php" ?>
            </div>

    </div>

    

    <?php include "../php/load_footer.php"; ?>
</body>

</html>