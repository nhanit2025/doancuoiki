<?php

if (!isset($_GET['id_order'])) {
    die("Không tìm thấy ID đơn hàng!");
}

$id_order = intval($_GET['id_order']);

$sql = "SELECT * FROM tbl_orders WHERE id_order = $id_order LIMIT 1";
$query = mysqli_query($conn, $sql);

if (!$query) {
    die("Lỗi SQL: " . mysqli_error($conn));
}

$order = mysqli_fetch_array($query);
?>

<h2>Sửa đơn hàng #<?= $id_order ?></h2>

<form method="POST" action="modules/quanlidonhang/xuli.php?id_order=<?= $id_order ?>">
    <table>
        <tr>
            <td>Trạng thái</td>
            <td>
                <select name="status">
                    <option value="Đang xử lí" <?= ($order['status']=='Đang xử lí')?'selected':'' ?>>Đang xử lí</option>
                    <option value="Hoàn tất" <?= ($order['status']=='Hoàn tất')?'selected':'' ?>>Hoàn tất</option>
                    <option value="Đang giao" <?= ($order['status']=='Chưa xử lý')?'selected':'' ?>>Đang giao</option>
                    <option value="Đã hủy" <?= ($order['status']=='Hủy')?'selected':'' ?>>Đã hủy</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="suaorder" value="Cập nhật">
            </td>
        </tr>
    </table>
</form>
</table>
<head>
    <link rel="stylesheet" href="css/quanlidonhang.css">
</head>