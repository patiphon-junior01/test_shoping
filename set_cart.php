<?php
session_start();
$x = isset($_POST['id']) ? $_POST['id'] : "";

if (isset($_SESSION['data']) != "") {
  array_splice($_SESSION['data'], $x, 1);
  $array = $_SESSION['data'];
  $count  = count($array) > 0  ?  count($array) : 0;
  $_SESSION["count_order"] = $count;
}

echo "success";
