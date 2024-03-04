<?php
  session_start();

  include "../getdb.php";

  $connect = new mysqli($servername, $username, $password, $databasename);
  if ($connect->connect_error) {
    die(include "../admin/redirect.php");
  }

?>