 tạo trang regester sử sụng database login_demo , bảng users có các trường id, username, password
<?php
include("db_connect.php");
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($link, $query)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($link);
    }
}