<?php include "../php/database_connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cool Piekarnia | Kategorie</title>
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
            <h2>Wszystie Kategorie</h2>
        </div>
        <br>
            <div class="row elements"></div>
            <div class="row">
                <?php 
                    if(isset($_SESSION['id'])) {
                        $result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
                        $row = $result->fetch_assoc();
                        if(!$row['user_admin']) {
                            #jezeli nie adam
                            include "../php/display_category.php";
                        } else { 
                            #jezeli adam
                            include "../admin/php/categories_display.php";

                            if(isset($_GET['rename']) && isset($_GET['category'])) {
                                $result = $connect->query("SELECT * FROM category WHERE category_id = '{$_GET['category']}'");
                                $row = $result->fetch_assoc();
                                echo "
                                    <center>
                                    <form method='POST' action='../admin/php/categories_rename.php?category={$_GET['category']}'>
                                        <center><p>Zmień Nazwę</p></center>
                                        <input type='text' name='newNam' maxlenght='128' style='width: 250px; height: 25px;' value='{$row['category_name']}'>
                                        <input type='submit'  style='width: 30px; height: 25px;' value='➫'>
                                    </form>
                                    <br><br><br>
                                ";
                            }
                            if(isset($_GET['updateImage']) && isset($_GET['category'])) {
                                $result = $connect->query("SELECT * FROM category WHERE category_id = '{$_GET['category']}'");
                                $row = $result->fetch_assoc();
                                echo "
                                    <center>
                                    <form method='POST' action='../admin/php/categories_setimg.php?category={$_GET['category']}' enctype='multipart/form-data'>
                                        <center><p>Zmień Obraz</p></center>
                                        <input type='file' name='newImg' style='width: 250px; height: 25px; border: none;'>
                                        <input type='submit'  style='width: 30px; height: 25px;' value='➫'>
                                    </form>
                                    <br><br><br>
                                ";
                            }


                        }
                    } else { 
                        #jezeli nie sesja
                        include "../php/display_category.php";
                    }
                ?>
            </div>
            <br><br><br><br><br><br>
    </div>

    

    <?php include "../php/load_footer.php"; ?>
</body>

</html>