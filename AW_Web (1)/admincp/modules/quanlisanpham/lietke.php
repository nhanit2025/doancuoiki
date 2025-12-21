<?php
    $sql_lietke_sanpham = "SELECT * FROM tbl_products, tbl_categories WHERE tbl_products.id_category= tbl_categories.id_category ORDER BY id_product DESC";
    $query_lietke_sanpham = mysqli_query($conn, $sql_lietke_sanpham);
?>
<h2>Danh sách sản phẩm</h2>
<table border="1" width="80%" style="text-align: center;">
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Mã</th>
        <th>Giá</th>
        <th>Nội dung</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Hình ảnh</th>
        <th>Quản lí</th>
    </tr>
<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_sanpham)){
        $i++;
?>    
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['name_product'] ?></td>
        <td><?php echo $row['code_product'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><?php echo $row['quantity'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <!-- <td>
        <img src="/AW_Web/admincp/modules/quanlisanpham/uploads/<?php echo $row['image']; ?>" width="80" height="80">

        </td> -->
        <td>
<?php
$sql_img = "SELECT * FROM tbl_product_images
            WHERE id_product=".$row['id_product'];
$query_img = mysqli_query($conn, $sql_img);
while($img = mysqli_fetch_array($query_img)){
?>
    <img src="/AW_Web/admincp/modules/quanlisanpham/uploads/<?php echo $img['image']; ?>"
         width="60">
<?php } ?>
</td>

        <td>
            <a href="?action=quanlisanpham&query=sua&id_product=<?php echo $row['id_product']; ?>">Sửa</a> | <a href="modules/quanlisanpham/xuli.php?id_product=<?php echo $row['id_product']; ?>">Xóa</a>
        </td>
    </tr>
<?php
    }
?>

</table>
<head>
    <link rel="stylesheet" href="css/quanlisanpham.css">
</head>