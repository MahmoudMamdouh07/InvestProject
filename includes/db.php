<?php
$server_name = "localhost";
    $username    = "root";
    $password    = "";
    $dbname      = "college";

      $conn = new mysqli($server_name, $username, $password, $dbname);
      if($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }
?>