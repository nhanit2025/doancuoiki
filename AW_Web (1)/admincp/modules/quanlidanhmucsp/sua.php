<?php
    if (!isset($_GET['id_category'])) {
        echo "Không tìm thấy ID danh mục!";
        exit();
    }

    // Lấy ID và ép kiểu an toàn
    $id = intval($_GET['id_category']);

    // Truy vấn danh mục cần sửa
    $sql_sua_danhmucsp = "SELECT * FROM tbl_categories WHERE id_category = $id LIMIT 1";
    $query_sua_danhmucsp = mysqli_query($conn, $sql_sua_danhmucsp);
    $row = mysqli_fetch_array($query_sua_danhmucsp);
?>
<p>Sửa danh mục</p>

<form method="POST" action="modules/quanlidanhmucsp/xuli.php?id_category=<?php echo $id; ?>">
<table>
    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" name="tendanhmuc" value="<?php echo $row['name']; ?>" required></td>
    </tr>

    <tr>
        <td>Thứ tự</td>
        <td><input type="number" name="thutu" value="<?php echo $row['thutu']; ?>" required></td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="submit" name="suadanhmuc" value="Cập nhật">
        </td>
    </tr>
</table>
</form>
</table>
<head>
    <link rel="stylesheet" href="css/quanlidanhmuc.css">
</head>