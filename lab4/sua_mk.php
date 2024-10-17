<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra nếu người dùng đã gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['id']; // Lấy ID người dùng từ session
    $oldPassword = md5($_POST['old_password']); // Băm mật khẩu cũ
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Kiểm tra mật khẩu cũ
    $sql = "SELECT password FROM customers WHERE id = '$userId'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // So sánh mật khẩu cũ
        if ($row['password'] !== $oldPassword) {
            echo "Mật khẩu cũ không đúng.";
        } elseif ($newPassword !== $confirmPassword) {
            echo "Mật khẩu mới và xác nhận mật khẩu không khớp.";
        } elseif ($oldPassword === md5($newPassword)) {
            echo "Mật khẩu mới không được giống với mật khẩu cũ.";
        } else {
            // Băm mật khẩu mới
            $newPasswordHashed = md5($newPassword);

            // Cập nhật mật khẩu mới vào CSDL
            $updateSql = "UPDATE customers SET password = '$newPasswordHashed' WHERE id = '$userId'";
            if ($conn->query($updateSql) === TRUE) {
                echo "Cập nhật mật khẩu thành công.";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }
    } else {
        echo "Người dùng không tồn tại.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa mật khẩu</title>
</head>
<body>
    <h2>Chỉnh sửa mật khẩu</h2>
    <form method="POST" action="">
        <label for="old_password">Mật khẩu cũ:</label>
        <input type="password" id="old_password" name="old_password" required><br><br>
        
        <label for="new_password">Mật khẩu mới:</label>
        <input type="password" id="new_password" name="new_password" required><br><br>
        
        <label for="confirm_password">Xác nhận mật khẩu mới:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        
        <input type="submit" value="Cập nhật mật khẩu">
    </form>
</body>
</html>
