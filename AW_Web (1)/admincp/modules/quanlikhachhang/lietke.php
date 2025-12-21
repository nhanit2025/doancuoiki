<?php


$sql_lietke_user = "SELECT * FROM tbl_user ORDER BY id_user DESC";
$query_lietke_user = mysqli_query($conn, $sql_lietke_user);
?>

<h2>Danh sách khách hàng</h2>
<table border="1" width="90%" style="text-align:center;">
    <tr>
        <th>STT</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
        <th>Quản lý</th>
    </tr>
<?php
$i = 0;
while($row = mysqli_fetch_assoc($query_lietke_user)){
    $i++;
?>
    <tr>
        <td><?= $i ?></td>
        <td><?= htmlspecialchars($row['name_user']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['phone']) ?></td>
        <td><?= htmlspecialchars($row['address']) ?></td>
        <td>
            <a href="?action=quanlikhachhang&query=sua&id_user=<?= $row['id_user'] ?>">Sửa</a> |
            <a href="modules/quanlikhachhang/xuli.php?id_user=<?= $row['id_user'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
        </td>
    </tr>
<?php } ?>
</table>
<head>
    <link rel="stylesheet" href="css/quanlikhachhang.css">
</head>