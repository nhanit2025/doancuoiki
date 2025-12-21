<?php
    $sql_lietke_danhmucsp = "SELECT * FROM tbl_categories ORDER BY thutu DESC";
    $query_lietke_danhmucsp = mysqli_query($conn, $sql_lietke_danhmucsp);
?>
<h2>Danh sách danh mục</h2>
<table border="1" width="80%">
    <tr>
        <th>Id</th>
        <th>Tên danh mục</th>
        <th>Quản lí</th>
    </tr>
<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
        $i++;
?>    
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['name'] ?></td>
        <td>
            <a href="?action=quanlidanhmuc&query=sua&id_category=<?php echo $row['id_category']; ?>">Sửa</a> | <a href="modules/quanlidanhmucsp/xuli.php?id_category=<?php echo $row['id_category']; ?>">Xóa</a>
        </td>
    </tr>
<?php
    }
?>

</table>
<head>
    <link rel="stylesheet" href="css/quanlidanhmuc.css">
</head>