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
   <title>Thông tin</title>

   <!-- link biểu tượng liên kết  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- liên kết file style.css  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- phần tiêu đề  -->
<?php include 'components/user_header.php'; ?>


<section class="user-details">

   <div class="user">
      <?php
         
      ?>
      <img src="images/user.png" alt="">
      <p><i class="fas fa-user"></i><span><span><?= $fetch_profile['name']; ?></span></span></p>
      <p><i class="fas fa-phone"></i><span><?= $fetch_profile['number']; ?></span></p>
      <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email']; ?></span></p>
      <a href="update_profile.php" class="btn">Sửa Thông Tin</a>
      <p class="address"><i class="fas fa-map-marker-alt"></i><span><?php if($fetch_profile['address'] == ''){echo 'Vui lòng nhập địa chỉ của bạn';}else{echo $fetch_profile['address'];} ?></span></p>
      <a href="update_address.php" class="btn">Sửa Địa Chỉ</a>
   </div>

</section>

<?php include 'components/footer.php'; ?>

<!-- liên kết tệp js   -->
<script src="js/script.js"></script>

</body>
</html>