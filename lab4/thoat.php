<?php
session_start(); // Bắt đầu session

// Xóa tất cả các giá trị trong session
$_SESSION = array(); // Thiết lập mảng session thành rỗng

// Nếu bạn muốn xóa session hoàn toàn, bạn có thể gọi session_destroy()
session_destroy(); // Hủy phiên session

// Xóa cookie (nếu cần)
$cookie_name = "fullname";
$cookie_id = "id";

// Thiết lập cookie với thời gian hết hạn trong quá khứ để xóa
setcookie($cookie_name, '', time() - 3600, '/');
setcookie($cookie_id, '', time() - 3600, '/');

// Chuyển hướng về trang đăng nhập hoặc trang chính
header('Location: login.php'); // Thay đổi đến trang bạn muốn
exit(); // Kết thúc script
?>
