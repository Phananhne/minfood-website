<?php

include '../components/connect.php';                                 //include được sử dụng để đưa các tệp khác vào một tệp PHP.

session_start();                                                     //session_start() tạo phiên hoặc tiếp tục phiên hiện tại.

if(isset($_POST['submit'])){                                         //Hàm isset() để kiểm tra biến đã được tồn tại hay chưa.

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);                                      //mật khẩu đã được mã hóa bằng hàm sha1
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");   //prepare bảo mật nhất rồi chạy câu truy vấn.Tham số truyền vào CSDL là các dấu ? là tham số ẩn danh.
   $select_admin->execute([$name, $pass]);                             //execute thực thi câu lệnh.
   
   if($select_admin->rowCount() > 0){                                   //rowCount() trả về số lượng bị tác động sau khi thực hiện thao tác.
      $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
      $_SESSION['admin_id'] = $fetch_admin_id['id'];
      header('location:dashboard.php');
   }else{
      $message[] = 'Tên đăng nhập hoặc mật khẩu không chính xác!';
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
   <title>Trang Đăng Nhập</title>

   <!-- phông chữ liên kết cdn  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- liên kết tệp css  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- Phần biểu mẫu đăng nhập quản trị viên -->
<section class="form-container">

   <form action="" method="POST">
      <h3>Admin Đăng Nhập</h3>
      <input type="text" name="name" maxlength="20" required placeholder="Nhập tên người dùng" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" maxlength="20" required placeholder="Nhập mật khẩu của bạn" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Đăng Nhập" name="submit" class="btn">
   </form>

</section>

</body>
</html>