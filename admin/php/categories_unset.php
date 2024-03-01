<?php
include 'database_connection.php';
//czy admin
$result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
$row = $result->fetch_assoc();
if (!$row['user_admin']) {
    header("Location: ../redirect.php?d");
    exit();
}

if(isset($_POST['rem'])) {
    $rem_id = isset($_POST['rem']) ? intval($_POST['rem']) : 0;
    $sql = "DELETE FROM categories WHERE categories_id = ?";
    $stmt = $connect->prepare($sql);


    if ($stmt) {
        $stmt->bind_param("i", $rem_id);
        $stmt->execute();
        $stmt->close();
    }
    $tmp = $_GET['product'];
    header("Location: ../redirect.php?products=$tmp");
    exit();
}
?>
