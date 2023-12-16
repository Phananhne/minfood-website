<?php

include '../components/connect.php';                     //include được sử dụng để đưa các tệp khác vào một tệp PHP.

session_start();                                         //session_start() tạo phiên hoặc tiếp tục phiên hiện tại.

$admin_id = $_SESSION['admin_id'];                       

if(!isset($admin_id)){                                   //Hàm isset() để kiểm tra biến đã được tồn tại hay chưa.
   header('location:admin_login.php');
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
   <title>Quản Lý</title>

   <!-- phông chữ, icon liên kết cdn  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- liên kết tệp css  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- phần bảng điều khiển quản trị viên -->

<section class="dashboard">

   <h1 class="heading">Quản Lý MinFood</h1>

   <div class="box-container">

   <div class="box">
      <h3>Chào Mừng!</h3>
      <p><?= $fetch_profile['name']; ?></p>
      <a href="update_profile.php" class="btn">Cập nhật hồ sơ</a>
   </div>

   <div class="box">
      <?php
         $total_pendings = 0;
         $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
         $select_pendings->execute(['Chờ xử lý']);
         while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
            $total_pendings += $fetch_pendings['total_price'];
         }
      ?>
      <h3><span>₫</span><?= $total_pendings; ?><span></span></h3>
      <p>Đơn Chờ Xử Lý</p>
      <a href="placed_orders.php" class="btn">Xem</a>
   </div>

   <div class="box">
      <?php
         $total_completes = 0;
         $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
         $select_completes->execute(['Hoàn Thành']);
         while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
            $total_completes += $fetch_completes['total_price'];
         }
      ?>
      <h3><span>₫</span><?= $total_completes; ?><span></span></h3>
      <p>Đơn Hoàn Thành</p>
      <a href="placed_orders.php" class="btn">Xem</a>
   </div>

   <div class="box">
      <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders`");
         $select_orders->execute();
         $numbers_of_orders = $select_orders->rowCount();
      ?>
      <h3><?= $numbers_of_orders; ?></h3>
      <p>Tổng Số Đơn Đặt Hàng</p>
      <a href="placed_orders.php" class="btn">Xem</a>
   </div>

   <div class="box">
      <?php
         $select_products = $conn->prepare("SELECT * FROM `products`");
         $select_products->execute();
         $numbers_of_products = $select_products->rowCount();
      ?>
      <h3><?= $numbers_of_products; ?></h3>
      <p>Sản Phẩm Thêm Vào</p>
      <a href="products.php" class="btn">Xem</a>
   </div>

   <div class="box">
      <?php
         $select_users = $conn->prepare("SELECT * FROM `users`");
         $select_users->execute();
         $numbers_of_users = $select_users->rowCount();
      ?>
      <h3><?= $numbers_of_users; ?></h3>
      <p>Tài Khoản Người Dùng</p>
      <a href="users_accounts.php" class="btn">Xem</a>
   </div>

   <div class="box">
      <?php
         $select_admins = $conn->prepare("SELECT * FROM `admin`");
         $select_admins->execute();
         $numbers_of_admins = $select_admins->rowCount();
      ?>
      <h3><?= $numbers_of_admins; ?></h3>
      <p>Quản Trị Viên</p>
      <a href="admin_accounts.php" class="btn">Xem</a>
   </div>

   <div class="box">
      <?php
         $select_messages = $conn->prepare("SELECT * FROM `messages`");
         $select_messages->execute();
         $numbers_of_messages = $select_messages->rowCount();
      ?>
      <h3><?= $numbers_of_messages; ?></h3>
      <p>Tin Nhắn Khách Hàng</p>
      <a href="messages.php" class="btn">Xem</a>
   </div>

   </div>

</section>

<!-- liên kết tệp js  -->
<script src="../js/admin_script.js"></script>

</body>
</html>