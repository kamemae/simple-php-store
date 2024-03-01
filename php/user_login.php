<?php
    session_start();
    include "database_connection.php";

    /*
    $username = $_POST['name'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM user WHERE user_name='$username' AND user_password='$pass';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['id'] = $row['id']; 
        header("Location: ../public/account.php");
        exit();
    
    */

    if(isset($_POST['name']) && isset($_POST['pass'])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        

        $username = validate($_POST['name']);
        $pass = validate($_POST['pass']);

        //$username = $_POST['name'];
        //$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);


        if(empty($username) || empty($pass)) {
            header("Location: ../public/login.php?error=rock");
            exit();
        }

        $sql = "SELECT * FROM user WHERE user_name='$username' AND user_password='$pass';";
        $result = mysqli_query($connect, $sql);
    

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if($row['user_name'] == $username && $row['user_password'] == $pass) {
                echo "gyaaaaaaaaaaaaaaaaaaaaaaat";
                $_SESSION['name'] = $row['user_name'];
                $_SESSION['pass'] = $row['user_password'];
                $_SESSION['id'] = $row['user_id'];
                header("Location: ../public/account.php");
            } 
        } else {
            header("Location: ../public/login.php?error=username");
            exit(); 
        }
    } else {
        header("Location: ../public/login.php");
    }
    
?>