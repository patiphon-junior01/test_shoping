<?php
session_start();
require_once("connection.php");


$price = isset($_SESSION['total']) ? $_SESSION['total'] : false;
$list = isset($_SESSION['send_order']) ? $_SESSION['send_order'] : false;
$list_order =  json_encode($list);
if (count($list) == 0) {
  echo "<script>alert('ไม่มีรายการที่จะเพิ่ม');</script>";
  echo "<script>location.assign('index.php');</script>";
} else {
  try {
    $sql = "INSERT INTO list_order (list, price) VALUES(:list, :price)";
    $result = $obj->prepare($sql);
    $result->execute([
      'list' => $list_order,
      'price' => $price
    ]);
    if ($result) {
      unset($_SESSION['total']);
      unset($_SESSION['data']);
      unset($_SESSION['send_order']);
      echo "<script>alert('เพิ่มรายการสำเร็จ');</script>";
      echo "<script>location.assign('index.php');</script>";
    }
  } catch (Exception $e) {
    $e->getMessage();
  }
}
