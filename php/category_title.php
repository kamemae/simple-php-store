<?php
    if (!is_numeric($_GET["category"])) header("Location: ../resources/categorydoesnotexist.php");
    $result = $connect->query(
        "SELECT category_name FROM category WHERE category_id = {$_GET["category"]}"
    );
    if (!($result->num_rows > 0)) header("Location: ../resources/categorydoesnotexist.php");
    
    $row = $result->fetch_assoc();
    echo "<title>Cool Piekarnia | {$row["category_name"]}</title>";
?>