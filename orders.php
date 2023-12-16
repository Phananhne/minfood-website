<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

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
   <title>Đơn Hàng</title>

   <!-- link biểu tượng liên kết  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- liên kết file style.css  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- phần tiêu đề  -->
<?php include 'components/user_header.php'; ?>

<div class="heading">
   <h3>Đơn Đặt Hàng</h3>
   <p><a href="html.php">Trang chủ</a> <span> / Đơn hàng</span></p>
</div>

<section class="orders">

   <h1 class="title">Đơn Đặt Hàng Của Bạn</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">please login to see your orders</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>Thời Gian Đặt : <span><?= $fetch_orders['placed_on']; ?></span></p>
      <p>Tên : <span><?= $fetch_orders['name']; ?></span></p>
      <p>Email : <span><?= $fetch_orders['email']; ?></span></p>
      <p>Số Điện Thoại : <span><?= $fetch_orders['number']; ?></span></p>
      <p>Địa Chỉ : <span><?= $fetch_orders['address']; ?></span></p>
      <p>Phương Thức Thanh Toán : <span><?= $fetch_orders['method']; ?></span></p>
      <p>Đơn Đặt Hàng : <span><?= $fetch_orders['total_products']; ?></span></p>
      <p>Thành Tiền : <span>₫<?= $fetch_orders['total_price']; ?></span></p>
      <p> Trạng Thái : <span style="color:<?php if($fetch_orders['payment_status'] == 'Chờ xử lý'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">chưa có đơn hàng nào được đặt!</p>';
      }
      }
   ?>

   </div>

</section>

<?php include 'components/footer.php'; ?>

<!-- liên kết tệp js   -->
<script src="js/script.js"></script>

</body>
</html>