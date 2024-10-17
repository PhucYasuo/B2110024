<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CSV</title>
</head>
<body>
    <h2>Tải lên tệp CSV</h2>
    <form action="upload-csv-processing.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Chọn tệp CSV:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <br><br>
        <input type="submit" value="Tải lên" name="submit">
    </form>
</body>
</html>