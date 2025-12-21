<h2>Thêm khách hàng</h2>
<form method="POST" action="modules/quanlikhachhang/xuli.php">
    <table>
        <tr>
            <td>Họ tên</td>
            <td><input type="text" name="name_user" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="u_password" required></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" name="phone" required></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="address" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="themkhachhang" value="Thêm khách hàng">
            </td>
        </tr>
    </table>
</form>
<head>
    <link rel="stylesheet" href="css/quanlikhachhang.css">
</head>
