<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $address = $_POST['building'].', '.$_POST['area'].', '.$_POST['town'] .', '. $_POST['city'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'Đã Lưu Địa Chỉ!';

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
   <title>Cập Nhật Địa Chỉ</title>

   <!-- link biểu tượng liên kết  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- liên kết file style.css  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php' ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Địa Chỉ Của Bạn</h3>
      <input type="text" class="box" placeholder="Địa Chỉ Cụ Thể" required maxlength="50" name="building">
      <input type="text" class="box" placeholder="Phường/Xã" required maxlength="50" name="area">
      <input type="text" class="box" placeholder="Quận/Huyện" required maxlength="50" name="town">
      <input type="text" class="box" placeholder="Tỉnh/Thành Phố" required maxlength="50" name="city">
      <input type="submit" value="Lưu Địa Chỉ" name="submit" class="btn">
   </form>

</section>

<?php include 'components/footer.php' ?>

<!-- liên kết tệp js   -->
<script src="js/script.js"></script>

</body>
</html>