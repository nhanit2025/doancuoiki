<?php
if(isset($_POST['dangky'])){
    $name_user = $_POST['hovaten'];
    $email     = $_POST['email'];
    $phone     = $_POST['dienthoai'];
    $u_password = password_hash($_POST['matkhau'], PASSWORD_DEFAULT);
    $address   = $_POST['diachi'];

    $check = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        echo "<p style='color:red'>Email đã tồn tại</p>";
    } else {
        $sql_dangky = mysqli_query($conn, "
            INSERT INTO tbl_user(name_user,email,u_password,phone,address) VALUES(
                '$name_user','$email','$u_password','$phone','$address'
            )
        ");
        if($sql_dangky){
            echo "<p style='color:green'>Đăng ký thành công</p>";
        } else {
            echo "<p style='color:red'>Đăng ký thất bại</p>";
        }
    }
}
?>

<form method="POST" class="register-form" autocomplete="off">
    <table class="login-table">
        <tr>
            <td>Họ và Tên<br>
                <input type="text" name="hovaten">
            </td>
        </tr>
        <tr>
            <td>Email<br>
                <input type="text" name="email">
            </td>
        </tr>
        <tr>
            <td>Mật khẩu<br>
                <input type="password" name="matkhau">
            </td>
        </tr>
        <tr>
            <td>Số điện thoại<br>
                <input type="text" name="dienthoai">
            </td>
        </tr>
        <tr>
            <td>Địa chỉ<br>
                <input type="text" name="diachi">
            </td>
        </tr>
        <tr>
            <td class="login-action">
                <input type="submit" name="dangky" value="Đăng kí">
                <a href="index.php?quanli=taikhoan" class="register-link">
                    Đã có tài khoản? Đăng nhập
                </a>
            </td>
        </tr>
    </table>
</form>
<head>
    <link rel="stylesheet" href="css/register.css">
</head>