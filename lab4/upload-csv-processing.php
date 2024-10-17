<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($imageFileType != "csv") {
    echo "Sorry, only csv files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
}else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        echo '<br>';
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbanhang";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        
        $name_file = basename($_FILES["fileToUpload"]["name"]);
        

        if (($handle = fopen($name_file, 'r')) !== FALSE) {
            // Đọc từng dòng của file CSV
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                // Xử lý dữ liệu (mỗi dòng sẽ là một mảng)
                $id = (int)$data[0];
                $fullname = $data[1];
                $email = $data[2];
                $Birthday = $data[3];
                $password = $data[4];
                $up = "INSERT INTO customers(id,fullname,email,Birthday,password) VALUES ('".$id."','".$fullname."','".$email."','".$Birthday."','".$password."')";
                if ($conn->query($up) == TRUE) {
                    echo 'Cap nhat khach hang thanh cong!<br>';
                }
            }
            // Đóng file sau khi đọc xong
            fclose($handle);
        } else {
            echo "Không thể mở file.";
        }
    }
    
}
?>