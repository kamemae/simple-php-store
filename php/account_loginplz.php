<?php
    if (!isset($_SESSION["name"], $_SESSION["pass"], $_SESSION["id"])) {
        header("Location: ../public/login.php");
        exit();
    }
?>
