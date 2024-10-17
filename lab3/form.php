<!DOCTYPE HTML>
<html>
<body>
    <form action="luu.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        Birthday: <input type="date" name="birth"><br>
        
        Major: <select id="major" name="major_id">

<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = $_POST['id'];
    $sql = "select * FROM major";
    $result = $conn->query($sql);
    $result_all = $result -> fetch_all(MYSQLI_ASSOC);


    foreach ($result_all as $row) {

        echo  "<option value=" . $row['ID'] . ">" . $row['name_major']  .  "</option>";
    }
?>
</select>
        <input type="submit">
    </form>
</body>
</html>