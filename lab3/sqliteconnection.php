<?php
// Đường dẫn đến tệp cơ sở dữ liệu SQLite
$databaseFile = 'path/to/your/database.sqlite';

try {
    // Tạo kết nối SQLite3
    $sqlite3 = new SQLite3($databaseFile);
    
    echo "Connected successfully";
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Đóng kết nối
$sqlite3->close();
?>
