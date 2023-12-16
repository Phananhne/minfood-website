<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

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
   <title>Trang chủ</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- link biểu tượng liên kết -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- liên kết file style.css  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section class="hero">

   <div class="swiper hero-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="content">
               <span>Đặt hàng Online</span>
               <h3>Đặc Sản Miền Bắc</h3>
               <a href="category.php?category=Miền Bắc" class="btn">Xem thực đơn</a>

            </div>
            <div class="image">
               <img src="images/1home.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Đặt hàng Online</span>
               <h3>Đặc Sản Miền Nam</h3>
               <a href="category.php?category=Miền Nam" class="btn">Xem thực đơn</a>
            </div>
            <div class="image">
               <img src="images/2home.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Đặt hàng Online</span>
               <h3>Đặc Sản Miền Trung</h3>
               <a href="category.php?category=Miền Trung" class="btn">Xem thực đơn</a>
            </div>
            <div class="image">
               <img src="images/3home.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Đặt hàng Online</span>
               <h3>Đặc Sản Miền Tây</h3>
               <a href="category.php?category=Miền Tây" class="btn">Xem thực đơn</a>
            </div>
            <div class="image">
               <img src="images/home4.png" alt="">
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<section class="category">

   <h1 class="title">DANH MỤC ĐẶC SẢN</h1>

   <div class="box-container">

      <a href="category.php?category=Miền Bắc" class="box">
         <img src="images/bac.svg" alt="">
         <h3>Đặc Sản Miền Bắc</h3>
      </a>

      <a href="category.php?category=Miền Nam" class="box">
         <img src="images/nam.svg" alt="">
         <h3>Đặc Sản Miền Nam</h3>
      </a>

      <a href="category.php?category=Miền Trung" class="box">
         <img src="images/Trung.svg" alt="">
         <h3>Đặc Sản Miền Trung</h3>
      </a>

      <a href="category.php?category=Miền Tây" class="box">
         <img src="images/Tay.svg" alt="">
         <h3>Đặc Sản Miền Tây</h3>
      </a>

   </div>

</section>

<section class="products">

   <h1 class="title">Món Ăn Mới Nhất</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>₫</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn">Xem tất cả</a>
   </div>

</section>

<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- liên kết tệp js   -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>