<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'Đã gửi tin nhắn!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'Tin nhắn đã gửi thành công!!';

   }

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
   <title>Liên hệ</title>

   <!-- link biểu tượng liên kết  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- liên kết file style.css  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- phần tiêu đề  -->
<?php include 'components/user_header.php'; ?>

<div class="heading">
   <h3>Liên Hệ</h3>
   <p><a href="home.php">Trang chủ</a> <span> / Liên hệ</span></p>
</div>

<!-- phần liên hệ   -->

<section class="contact">

   <div class="row">

      <div class="image">
         <img src="images/contact-img1.svg" alt="">
      </div>

      <form action="" method="post">
         <h3>Hãy Cho Chúng Tôi Biết Thắc Mắc Của Bạn!</h3>
         <input type="text" name="name" maxlength="50" class="box" placeholder="Nhập tên của bạn" required>
         <input type="number" name="number" min="0" max="9999999999" class="box" placeholder="Số điện thoại" required maxlength="10">
         <input type="email" name="email" maxlength="50" class="box" placeholder="Email" required>
         <textarea name="msg" class="box" required placeholder="Nhập tin nhắn" maxlength="500" cols="30" rows="10"></textarea>
         <input type="submit" value="Gửi Tin Nhắn" name="send" class="btn">
      </form>

   </div>

</section>

<!-- phần chân trang  -->
<?php include 'components/footer.php'; ?>

<!-- liên kết tệp js   -->
<script src="js/script.js"></script>

</body>
</html>