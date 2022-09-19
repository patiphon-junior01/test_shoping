<?php
session_start();
require_once("connection.php");
$count = 0;

if (isset($_SESSION['data']) != "") {
  $array = $_SESSION['data'];
  // echo "<pre>";
  // print_r($array);
  // echo "</pre>";
  // echo count($array);
  $count  = count($array) > 0  ?  count($array) : 0;
  $_SESSION["count_order"] = $count;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shoping</title>
  <link rel="stylesheet" href="index.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <a href="orderall.php"> order all</a>
  <div class="body-content">
    <div class="shop">
      <?php
      $sql = "SELECT * FROM product";
      $select = $obj->query($sql);

      while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <div class="content-product">
          <p><?= $row['name'] ?></p>
          <p><?= $row['detail'] ?></p>
          <p><?= $row['price'] ?></p>
          <button id="<?= $row['id'] ?>" class="addorder">+</button>
        </div>

      <?php } ?>

      <div class="count" onclick="orderlist()">
        <div class="content-count">
          <p class="cart">ตะกร้า</p>
          <p class="count-cart"><?= $count ?></p>
        </div>
      </div>

    </div>

    <!-- <h1 id="respone">0</h1> -->
    <a href="logout.php">ออก</a>
  </div>



  <script>
    $("document").ready(() => {
      $(".addorder").click(function() {
        var mid = $(this).attr("id");
        // console.log(mid);

        $.ajax({
          url: "session.php",
          method: "post",
          data: {
            id: mid
          },
          success: function(response) {
            // $("#respone").text(data);
            location.reload();
            console.log(response);
          }
        });
      });
    })

    function orderlist() {
      location.assign("orderall.php");
    }
  </script>
</body>

</html>