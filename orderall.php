<?php
session_start();
require_once("connection.php");
$array = "";

if (isset($_SESSION['data']) != "") {
  $array = $_SESSION['data'];
  $array2 = $_SESSION['data'];
  usort($array, function ($a, $b) {
    return $a['id'] - $b['id'];
  });
  $input = array_map("unserialize", array_unique(array_map("serialize", $array)));
  usort($input, function ($a, $b) {
    return $a['id'] - $b['id'];
  });
  $data = $input;

  // echo "<pre>";
  // print_r($array);
  // echo "</pre>";
  $order = 1;
  $total = 0;
  $count_products = 0;
  $count_delete = 0;

  $count  = count($array) > 0  ?  count($array) : 0;
  $_SESSION["count_order"] = $count;
  $count_order = isset($_SESSION["count_order"]) ? $_SESSION["count_order"] : 0;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>order</title>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <a href="index.php">back</a>

  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>detail</th>
        <th>count</th>
        <th>price</th>
        <th>priceAll</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>

      <?php if ($array != "" && isset($_SESSION['data']) != "") { ?>

        <?php for ($i  = 0; $i < count($data); $i++) {
          $id_for1 = $data[$i]['id'];
          for ($k  = 0; $k < count($array2); $k++) {
            $id_for2 = $array2[$k]['id'];
            if ($id_for1 ==  $id_for2) {
              $count_products  += $array2[$k]['count'];
              $data[$i]['count'] =  $count_products;
            }
          }
          $data[$i]['priceall'] =  $data[$i]['price'] * $count_products;
          $priceall = $data[$i]['priceall'];
          $count_delete += $data[$i]['count'];
        ?>
          <tr>
            <td><?= $i ?></td>
            <td><?= $data[$i]['name'] ?></td>
            <td><?= $data[$i]['detail'] ?></td>
            <td><?= $data[$i]['count'] ?></td>
            <td><?= number_format($data[$i]['price'], 2) ?></td>
            <td><?= number_format($data[$i]['priceall'], 2) ?></td>
            <td class="t-flex">
              <button id="<?= $count_delete - 1 ?>" class="delete">ลบ</button>
              <button id="<?= $data[$i]['id'] ?>" class="add">เพิ่ม</button>
            </td>
          </tr>
        <?php
          $total +=  $priceall;
          $_SESSION['total'] = $total;
          $data[$i]['count'] = 1;
          $count_products = 0;
        } ?>
        <tr>
          <td colspan="3" align="left"><?= $count_order . " : รายการ  "; ?></td>
          <td colspan="4" align="right"><?= number_format($total, 2) ?></td>
        </tr>
        <tr>
          <td colspan="7" align="right">
            <button class="confrim" onclick="confirm()">
              ยืนยันออเดอร์
            </button>
          </td>
        </tr>
        <?php
        $_SESSION['send_order'] = $data;
        ?>
      <?php } else { ?>

        <tr>
          <td colspan="7" align="center">nodata select</td>
        </tr>

      <?php } ?>

    </tbody>
  </table>



  <script>
    $("document").ready(() => {
      $(".delete").click(function() {
        var mid = $(this).attr("id");
        console.log(mid);

        $.ajax({
          url: "set_cart.php",
          method: "post",
          data: {
            id: mid
          },
          success: function(response) {
            console.log(response);
            location.reload();
          }
        });
      });

      $(".add").click(function() {
        var mid = $(this).attr("id");

        $.ajax({
          url: "session.php",
          method: "post",
          data: {
            id: mid
          },
          success: function(response) {
            location.reload();
            console.log(response);
          }
        });
      });
    })

    function confirm() {
      location.assign("confirm.php");
    }
  </script>
</body>

</html>