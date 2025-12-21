<?php


if(!isset($_GET['id_user'])){
    die("Không tìm thấy ID khách hàng!");
}

$id_user = intval($_GET['id_user']);
$sql = "SELECT * FROM tbl_user WHERE id_user=$id_user LIMIT 1";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
?>

<h2>Sửa khách hàng</h2>
<form method="POST" action="modules/quanlikhachhang/xuli.php?id_user=<?= $row['id_user'] ?>">
    <table>
        <tr>
            <td>Họ tên</td>
            <td><input type="text" name="name_user" value="<?= htmlspecialchars($row['name_user']) ?>" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="u_password" value="<?= htmlspecialchars($row['u_password']) ?>" required></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" required></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="address" value="<?= htmlspecialchars($row['address']) ?>" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="suakhachhang" value="Cập nhật khách hàng">
            </td>
        </tr>
    </table>
</form>
<head>
    <link rel="stylesheet" href="css/quanlikhachhang.css">
</head>