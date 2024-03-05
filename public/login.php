<?php
    include "../php/database_connection.php";
    if(isset($_SESSION['name'], $_SESSION['pass'], $_SESSION['id'])) {
        header("Location: ../public/account.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LdTgXIpAAAAACUUBaNsBd2-or2DgqcQpablVNlg"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cool Piekarnia | Logowanie & Rejestracja</title>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/toggler.js" defer></script>
</head>
<body>
    <?php include "../php/load_header.php"; ?>
   <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2"><img src="../images/baker.png" alt="" width="100%"></div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Rejestracja</span>
                            <span onclick="register()">Logowanie</span>
                            <hr id="indicator">
                            <form action="../php/user_login.php" method="POST" id="login">
                            <?php include "../php/login_error.php"; ?>
                                <input type="text" name="name" id="" placeholder="Nazwa Użytkownika" required>
                                <input type="password" name="pass" placeholder="Hasło" required>   
                                <input type="submit" class="btn" value="Zaloguj się">
                                <a href="#">Nie pamiętam hasła</a>
                            </form>
                            <form action="../php/user_register.php" id="register">
                                <input type="text" name="" id="" placeholder="Nazwa Użytkownika" required>
                                <input type="email" name="" id="" placeholder="E-Mail" required>
                                <input type="password" placeholder="Hasło" required>
                                <input type="password" placeholder="Powtórz hasło" required>  
                                <input type="submit" class="btn" value="Zarejestruj się">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <br><br>
   </div>
   <script src="../js/loginform.js"></script>
    <?php include "../php/load_footer.php"; ?>
</body>
</html>
