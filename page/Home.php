<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if(!isset($_COOKIE['user_type'])) {
  // Nếu chưa, chuyển hướng đến trang đăng nhập
  header('Location:http://localhost/QuanliDKMonhoc/');
  exit();
}

// Nếu người dùng đã đăng nhập, hiển thị trang kết nối
?>

<html>
<head>
  <title>Kết nối</title>
</head>
<body>
  <h1>Trang kết nối</h1>
  <p>Chào mừng <?php echo $_COOKIE['user_name']; ?> đến với trang kết nối</p>
  <button onclick="logout()">Đăng xuất</button>
  <script>
       function logout() {
  // Xác nhận đăng xuất và xóa toàn bộ cookie
  if (confirm("Bạn có chắc chắn muốn đăng xuất?")) {
    document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "user_type=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "user_email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "user_name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    // Chuyển hướng đến trang đăng nhập
    window.location.href = 'http://localhost/QuanliDKMonhoc/';

    // Send a request to the server to delete the cookies on the server side as well
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../ACConut/Api/deleCookie.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
  }
}
  </script>
</body>
</html>
