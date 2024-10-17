<?php
$connection_string = "localhost";
$username = "root";
$password = "";

$conn = oci_connect($username, $password, $connection_string);

if (!$conn) {
    $e = oci_error();
    echo "Không thể kết nối đến cơ sở dữ liệu: " . $e['message'];
} else {
    echo "Kết nối thành công!";
}

// Đóng kết nối
oci_close($conn);
?>
