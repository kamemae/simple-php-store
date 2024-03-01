<?php 
    if(isset($_GET['error'])) { 
        switch($_GET['error']) {
            case "username":
                echo "<p class='error_msg'> Błędna nazwa użytkownika<br>lub błędne hasło! </p>";
                break;
            case "nouser":
                echo "<p class='error_msg'> Taki użytkownik nie istnieje! </p>";
                break;
            case "database":
                echo "<p class='error_msg'> Nie mogliśmy przetworzyć zapytania </p>";
                break;
            case "plzlogin":
                echo "<p class='error_msg'> Aby mieć dostęp, zaloguj się </p>";
                break;
            case "rock":
                header("Location: https://www.youtube.com/watch?v=NQrmEccoYI0");
                break;
        }
    }
?>