<?php

    if(isset($_GET['c'])) {
        header("Location: ../public/categories.php");
    } else if(isset($_GET['m'])) {
        header("Location: ../public/products.php");
    } else if(isset($_GET['products'])) {
        header("Location: ../public/landing.php?product={$_GET['products']}");
    } else if(isset($_GET['catimg'])) {
        header("Location: ../public/categories.php?updateImage&category={$_GET['category']}");
    } else {
        header("Location: ../public/");
    }
?>