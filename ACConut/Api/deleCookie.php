<?php

// Đọc giá trị các cookie từ yêu cầu
$user_id = $_COOKIE['user_id'];
$user_type = $_COOKIE['user_type'];
$user_email = $_COOKIE['user_email'];
$user_name = $_COOKIE['user_name'];

// Xóa các cookie bằng cách thiết lập thời gian sống của chúng là quá khứ
setcookie('user_id', '', time() - 3600, '/');
setcookie('user_type', '', time() - 3600, '/');
setcookie('user_email', '', time() - 3600, '/');
setcookie('user_name', '', time() - 3600, '/');

// Phản hồi với mã trạng thái 200 để chỉ ra rằng yêu cầu đã hoàn thành thành công
http_response_code(200);

?>
