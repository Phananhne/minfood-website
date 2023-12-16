<?php

include 'components/connect.php';            //include được sử dụng để đưa các tệp khác vào một tệp PHP.

session_start();                             //session_start() tạo phiên hoặc tiếp tục phiên hiện tại.

if(isset($_SESSION['user_id'])){             //Hàm isset() để kiểm tra biến user_id đã được tồn tại hay chưa.
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
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
   <title>Giới Thiệu</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!--link biểu tượng liên kết -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- liên kết file style.css  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- phần tiêu đề  -->
<?php include 'components/user_header.php'; ?>

<div class="heading">
   <h3>Về Chúng Tôi</h3>
   <p><a href="home.php">Trang chủ</a> <span> / Giới thiệu</span></p>
</div>

<!-- về phần giới thiệu bắt đầu  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/cooking.png" alt="">
      </div>

      <div class="content">
         <h3>Tại sao nên chọn chúng tôi?</h3>
         <p>Nếu bạn là một tín đồ ăn uống, đừng bỏ qua MinFood. 
            Dành cho những bạn thích tìm những món ăn uống, muốn khám phá hương vị ẩm thực Việt Nam khác biệt theo từng vùng miền, ngon, 
            giá cả phải chăng thì website nhà hàng ẩm thực MinFood là một chọn lựa tuyệt vời.</p>
         <a href="menu.php" class="btn">Thực Đơn của MinFood</a>
      </div>

   </div>

</section>


<section class="steps">

   <h1 class="title">Các Bước Đơn Giản</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/chonmonn.png" alt="">
         <h3>Chọn Món</h3>
      </div>

      <div class="box">
         <img src="images/giaohang.png" alt="">
         <h3>Giao Hàng Nhanh Chóng</h3>
      </div>

      <div class="box">
         <img src="images/thuongthuc.png" alt="">
         <h3>Thưởng Thức Món Ăn</h3>
      </div>

   </div>

</section>


<!-- phần chân trang  -->
<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- liên kết tệp js   -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>