<?php
// ==================
// KẾT NỐI DATABASE
// ==================
$servername = "database-server-lab7.cocgl5wbv5ga.ap-southeast-1.rds.amazonaws.com";
$dbusername = "admin";
$dbpassword = "12345678";
$dbname     = "myDB";

// Tạo kết nối
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

$message = "";

// ==================
// XỬ LÝ FORM LOGIN
// ==================
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM User WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $message = "Bạn đã đăng nhập thành công";
    } else {
        $message = "Tên đăng nhập hoặc mật khẩu không đúng";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>

<h2>Đăng nhập</h2>

<form method="post">
    <label>Tên đăng nhập:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Mật khẩu:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Đăng nhập">
</form>

<p style="color: red;">
    <?php echo $message; ?>
</p>

</body>
</html>
