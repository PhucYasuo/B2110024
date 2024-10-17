<?php
$serverName = "localhost";
$connectionOptions = array(
    "Database" => "your_database_name",
    "Uid" => "your_username",
    "PWD" => "your_password"
);

// Kết nối đến SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Kiểm tra kết nối
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "Connected successfully";

// Đóng kết nối
sqlsrv_close($conn);
?>
