<form action="./ACConut/Api/ApiSigNin.php" method="POST" onsubmit="return login()">
   <input type="email" id="email" name="email" />
   <input type="password" id="password" name="password"/>
   <button type="submit" name="">SigNin</button>
</form>

<script>
function login() {
  // Lấy thông tin email và password từ form đăng nhập
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;

  // Gửi yêu cầu đăng nhập đến API
  var xhr = new XMLHttpRequest();
  xhr.open('POST', './ACConut/Api/ApiSigNin.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Thành công: hiển thị thông báo và chuyển hướng đến trang chủ
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          alert('Đăng nhập thành công!');
          window.location.href = 'http://localhost/QuanliDKMonhoc/page/Home.php';
        } else {
          alert('Email hoặc mật khẩu không đúng!');
        }
      } else {
        // Lỗi: hiển thị thông báo lỗi
        alert('Đăng nhập thất bại!');
      }
    }
  };
  xhr.send('email=' + email + '&password=' + password);

  // Ngăn chặn gửi form trực tiếp
  return false;
}
</script>
