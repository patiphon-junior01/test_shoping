<?php
$username = "root";
$password = "";
$dns = "mysql:host=localhost;dbname=shoping_test";


try {
  $obj = new PDO($dns, $username, $password);
  // echo "success connection";
} catch (Exception $e) {
  $e->getMessage();
}
