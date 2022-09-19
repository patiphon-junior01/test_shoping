<?php
session_start();
require_once("connection.php");


$price = $_SESSION['total'];
$list = $_SESSION['send_order'];
$list =  json_encode($list);

try {
  $sql = "INSERT INTO list_order (list, price) VALUES(:list, :price)";
  $result = $obj->prepare($sql);
  $result->execute([
    'list' => $list,
    'price' => $price
  ]);
  if ($result) {
    unset($_SESSION['total']);
    unset($_SESSION['data']);
    echo "<script>location.assign('index.php');</script>";
  }
} catch (Exception $e) {
  $e->getMessage();
}
