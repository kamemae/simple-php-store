<?php
  session_start();

  include "../database.php";

  $connect = new mysqli($servername, $username, $password, $databasename);
  if ($connect->connect_error) {
      die(include "../resources/dbfailed.php");
  }

?>
