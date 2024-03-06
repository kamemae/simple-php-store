<?php
include "database_connection.php";
$result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
$row = $result->fetch_assoc();
if(!$row['user_admin']) {
    header("Location: ../public/index.php");
    exit();
}

if (isset($_GET['user']) && is_numeric($_GET['user'])) {
    $userToUpdate = $_GET['user'];
    if($_SESSION['id'] != $userToUpdate && $userToUpdate != 0) {
        $sql = "UPDATE user SET user_admin = false WHERE user_id = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("i", $userToUpdate);
        $stmt->execute();
        $stmt->close();
    }
}

header("Location: ../?menageUsers");
?>
