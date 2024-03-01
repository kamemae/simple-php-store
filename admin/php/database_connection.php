<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $databasename = "piekarnia";

  $connect = new mysqli($servername, $username, $password, $databasename);
  if ($connect->connect_error) {
    die(include "../admin/redirect.php");
  }

?>