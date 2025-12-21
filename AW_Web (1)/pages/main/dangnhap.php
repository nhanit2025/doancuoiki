<?php

if (isset($_POST['dangnhap'])) {

    $taikhoan = trim($_POST['email']);
    $matkhau  = trim($_POST['matkhau']);

    $sql = "SELECT * FROM tbl_user 
            WHERE email = '$taikhoan' 
            AND u_password = '$matkhau' 
            LIMIT 1";

    $query = mysqli_query($conn, $sql);
    if (!$query) {
        die(mysqli_error($conn));
    }

    if (mysqli_num_rows($query) > 0) {
    $_SESSION['dangnhap'] = $taikhoan; 
    header("Location:index.php?quanli=taikhoan");
    exit();
    }else {
        echo "<p>alert('Sai tài khoản hoặc mật khẩu');</p>";
    }
}
?>
<form method="POST" class="login-form" autocomplete="off">

    <input type="text" style="display:none">
    <input type="password" style="display:none">

    <table class="login-table">
        <tr>
            <td>
                Email<br>
                <input type="text" name="email" autocomplete="off">
            </td>
        </tr>

        <tr>
            <td>
                Mật khẩu<br>
                <input type="password" name="matkhau" autocomplete="off">
            </td>
        </tr>

        <tr>
            <td class="login-action">
                <input type="submit" name="dangnhap" value="Đăng nhập">
                <a href="index.php?quanli=dangky" class="register-link">
                    Chưa có tài khoản? Đăng ký
                </a>
            </td>
        </tr>
    </table>
</form>

<head>
    <link rel="stylesheet" href="css/login.css">
</head>