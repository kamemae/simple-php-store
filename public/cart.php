<?php
    include "../php/database_connection.php";
    //include "../php/account_loginplz.php";
    

    if(!$_SESSION['id']) {
        header("Location: ../public/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cool Piekarnia | Koszyk</title>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/toggler.js" defer></script>

</head>

<body>
    <?php include "../php/load_header.php"; ?>
    <div class="small-container cart-page">
        <table>
            <tr><th>Nazwa Produktu</th><th>Ilość</th><th></th><th>Cena</th></tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <a href="../public/landing.html">
                            <img src="../images/chlep.jpg" alt="">
                            <div>
                                <p>
                                    Cool Chlep
                                </p>
                                <small>
                                    2.50 PLN
                                </small>
                                <br><br>
                                <a href="#">Usuń</a>
                            </div>
                        </a>
                    </div>
                </td>
                <td><input type="number" min="1" max="10" value="1"></td>
                <td></td>
                <td>420 PLN</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <a href="../public/landing.html">
                            <img src="../images/chlep.jpg" alt="">
                            <div>
                                <p>
                                    Cool Chlep
                                </p>
                                <small>
                                    2.50 PLN
                                </small>
                                <br><br>
                                <a href="#">Usuń</a>
                            </div>
                        </a>
                    </div>
                </td>
                <td><input type="number" min="1" max="10" value="1"></td>
                <td></td>
                <td>420 PLN</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <a href="../public/landing.html">
                            <img src="../images/chlep.jpg" alt="">
                            <div>
                                <p>
                                    Cool Chlep
                                </p>
                                <small>
                                    2.50 PLN
                                </small>
                                <br><br>
                                <a href="#">Usuń</a>
                            </div>
                        </a>
                    </div>
                </td>
                <td><input type="number" min="1" max="10" value="1"></td>
                <td></td>
                <td>420 PLN</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <a href="../public/landing.html">
                            <img src="../images/chlep.jpg" alt="">
                            <div>
                                <p>
                                    Cool Chlep
                                </p>
                                <small>
                                    2.50 PLN
                                </small>
                                <br><br>
                                <a href="#">Usuń</a>
                            </div>
                        </a>
                    </div>
                </td>
                <td><input type="number" min="1" max="10" value="1"></td>
                <td></td>
                <td>420 PLN</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <a href="../public/landing.html">
                            <img src="../images/chlep.jpg" alt="">
                            <div>
                                <p>
                                    Cool Chlep
                                </p>
                                <small>
                                    2.50 PLN
                                </small>
                                <br><br>
                                <a href="#">Usuń</a>
                            </div>
                        </a>
                    </div>
                </td>
                <td><input type="number" min="1" max="10" value="1"></td>
                <td></td>
                <td>420 PLN</td>
            </tr>
        </table>



        
        <div class="total">
            <table>
                <tr>
                    <td>Koszyk</td>
                    <td>200 PLN</td>
                </tr>
                <tr>
                    <td>Dostawa</td>
                    <td>14.99 PLN</td>
                </tr>
                <tr>
                    <td>Całość</td>
                    <td>200 PLN</td>
                </tr>
            </table>
        </div>

    </div>
    <?php include "../php/load_footer.php"; ?>
</body>

</html>