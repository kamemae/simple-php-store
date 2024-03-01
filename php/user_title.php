<?php
    $result = $connect->query("SELECT user_name FROM user WHERE user_id = '{$_SESSION['id']}'");
    $row = $result->fetch_assoc();
    echo "<title>Cool Piekarnia | {$row['user_name']}</title>";
?>