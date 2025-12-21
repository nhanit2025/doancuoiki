<?php
session_start();
include('config/config.php');

if (isset($_POST['login'])) {

    $taikhoan = trim($_POST['username']);
    $matkhau  = trim($_POST['password']);

    $sql = "SELECT * FROM tbl_admin 
            WHERE adname = '$taikhoan' 
            AND password = '$matkhau' 
            LIMIT 1";

    $query = mysqli_query($conn, $sql);
    if (!$query) {
        die(mysqli_error($conn));
    }

    if (mysqli_num_rows($query) > 0) {
    $_SESSION['admin_login'] = $taikhoan; 
    header("Location:index.php");
    exit();
    }else {
        echo "<script>alert('Sai tài khoản hoặc mật khẩu');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | AlwaysWonder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="css/admin_login.css">
</head>
<body>

<div class="login-wrapper">
    <div class="login-box">
        <h2>Admin Login</h2>

        <form method="POST">
            <div class="input-group">
                <label>Tài khoản</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" name="login" class="btn-login">
                Đăng nhập
            </button>
        </form>

        <p class="note">Chỉ dành cho quản trị viên</p>
    </div>
</div>

</body>
</html>
