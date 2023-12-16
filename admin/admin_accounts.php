<?php

include '../components/connect.php';                           //include được sử dụng để đưa các tệp khác vào một tệp PHP.

session_start();                                               //session_start() tạo phiên hoặc tiếp tục phiên hiện tại.

$admin_id = $_SESSION['admin_id'];                            

if(!isset($admin_id)){                                         //Hàm isset() để kiểm tra biến admin_id đã được tồn tại hay chưa.
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){                                    //xóa tài khoản admin trong CSDL
   $delete_id = $_GET['delete'];
   $delete_admin = $conn->prepare("DELETE FROM `admin` WHERE id = ?");   //prepare bảo mật nhất rồi chạy câu truy vấn. Tham số truyền vào CSDL là các dấu ? là tham số ẩn danh.
   $delete_admin->execute([$delete_id]);                       //execute thực thi câu lệnh.
   header('location:admin_accounts.php');
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
   <title>Tài Khoản Quản Trị Viên</title>

   <!-- phông chữ liên kết cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- liên kết tệp css -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- phần tài khoản quản trị -->

<section class="accounts">

   <h1 class="heading">Tài Khoản Quản Trị Viên</h1>

   <div class="box-container">

   <div class="box">
      <p>Đăng ký Quản Trị Viên Mới</p>
      <a href="register_admin.php" class="option-btn">Đăng Ký</a>
   </div>

   <?php
      $select_account = $conn->prepare("SELECT * FROM `admin`");
      $select_account->execute();                                //execute thực thi câu lệnh.
      if($select_account->rowCount() > 0){                       //rowCount() trả về số lượng bị tác động sau khi thực hiện các thao tác.
         while($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)){      //Hàm fetch trích 1 dòng từ đối tượng dữ liệu để hiển thị.
   ?>
   <div class="box">
      <p> Admin ID : <span><?= $fetch_accounts['id']; ?></span> </p>
      <p> Tên Người Dùng : <span><?= $fetch_accounts['name']; ?></span> </p>
      <div class="flex-btn">
         <a href="admin_accounts.php?delete=<?= $fetch_accounts['id']; ?>" class="delete-btn" onclick="return confirm('Bạn có muốn xóa tài khoản?');">Xóa</a>
         <?php
            if($fetch_accounts['id'] == $admin_id){
               echo '<a href="update_profile.php" class="option-btn">Cập Nhật</a>';
            }
         ?>
      </div>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">Không Có Tài Khoản</p>';
   }
   ?>

   </div>

</section>

<!-- liên kết tệp js  -->
<script src="../js/admin_script.js"></script>

</body>
</html>