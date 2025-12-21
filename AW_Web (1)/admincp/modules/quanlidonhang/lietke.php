<?php


$sql_orders = "SELECT o.*, u.name_user, u.email 
               FROM tbl_orders o
               JOIN tbl_user u ON o.id_user = u.id_user
               ORDER BY created_at DESC";

$query_orders = mysqli_query($conn, $sql_orders);
?>

<h2>Danh sách đơn hàng</h2>
<table border="1" width="100%" style="text-align:center;">
    <tr>
        <th>ID</th>
        <th>Khách hàng</th>
        <th>Email</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Ngày tạo</th>
        <th>Quản lý</th>
    </tr>

<?php
$i = 0;
while($row = mysqli_fetch_array($query_orders)){
    $i++;
?>
    <tr>
        <td><?= $row['id_order'] ?></td>
        <td><?= htmlspecialchars($row['name_user']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= number_format($row['total_price'],0,',','.') ?> VNĐ</td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['created_at'] ?></td>
        <td>
            <a href="?action=quanlidonhang&query=sua&id_order=<?= $row['id_order'] ?>">Sửa</a> |
            <a href="xuli.php?id_order=<?= $row['id_order'] ?>">Xóa</a>
        </td>
    </tr>
<?php } ?>
</table>
</table>
<head>
    <link rel="stylesheet" href="css/quanlidonhang.css">
</head>