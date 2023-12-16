<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['update_payment'])){

   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $update_status = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_status->execute([$payment_status, $order_id]);
   $message[] = 'Đã cập nhật đơn hàng!';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<!-- mô tả ngôn ngữ của website -->
<html lang="en"> 
<head>
<!-- Thuộc tính giúp xác định kiểu mã hóa ký tự của trang web. -->
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- chiều rộng của chế độ xem sẽ bằng chiều rộng thiết bị mà người dùng sử dụng để xem website.
   Tỷ lệ của website sẽ được đặt thành 100% -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đơn Đặt Hàng</title>

   <!-- phông chữ liên kết cdn  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- liên kết tệp css  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- phần đặt hàng -->

<section class="placed-orders">

   <h1 class="heading">Đơn Đặt Hàng</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> ID Người Dùng : <span><?= $fetch_orders['user_id']; ?></span> </p>
      <p> Thời Gian Đặt : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> Tên : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> Email : <span><?= $fetch_orders['email']; ?></span> </p>
      <p> Số Điện Thoại : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> Địa Chỉ : <span><?= $fetch_orders['address']; ?></span> </p>
      <p> Tổng Sản Phẩm : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> Thành Tiền : <span>₫<?= $fetch_orders['total_price']; ?></span> </p>
      <p> Phương Thức Thanh Toán : <span><?= $fetch_orders['method']; ?></span> </p>
      <form action="" method="POST">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
         <select name="payment_status" class="drop-down">
            <option value="" selected disabled><?= $fetch_orders['payment_status']; ?></option>
            <option value="Chờ xử lý">Chờ xử lý</option>
            <option value="Hoàn Thành">Hoàn Thành</option>
         </select>
         <div class="flex-btn">
            <input type="submit" value="Cập Nhật" class="btn" name="update_payment">
            <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('Bạn có muốn xóa đơn đặt hàng không?');">Xóa</a>
         </div>
      </form>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">Chưa Có Đơn Đặt Hàng Nào Được Đặt!</p>';
   }
   ?>

   </div>

</section>

<!-- liên kết tệp js   -->
<script src="../js/admin_script.js"></script>

</body>
</html>