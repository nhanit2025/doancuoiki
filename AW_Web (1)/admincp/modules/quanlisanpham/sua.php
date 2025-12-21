<?php
if (!isset($_GET['id_product'])) {
    echo "Không tìm thấy ID sản phẩm!";
    exit();
}

$id = intval($_GET['id_product']);

$sql_sua_sanpham = "SELECT * FROM tbl_products WHERE id_product = $id LIMIT 1";
$query_sua_sanpham = mysqli_query($conn, $sql_sua_sanpham);
$row = mysqli_fetch_array($query_sua_sanpham);
?>

<p>Sửa sản phẩm</p>

<form method="POST" 
      action="modules/quanlisanpham/xuli.php?id_product=<?php echo $id; ?>" 
      enctype="multipart/form-data">
    <table>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" 
                       name="tensanpham" 
                       value="<?php echo $row['name_product']; ?>" 
                       required></td>
        </tr>

        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" 
                       name="masp" 
                       value="<?php echo $row['code_product']; ?>" 
                       required></td>
        </tr>

        <tr>
            <td>Giá</td>
            <td><input type="text" 
                       name="gia" 
                       value="<?php echo $row['price']; ?>" 
                       required></td>
        </tr>

        <tr>
            <td>Nội dung</td>
            <td><textarea rows="5" name="noidung"><?php echo $row['description']; ?></textarea></td>
        </tr>

        <tr>
            <td>Số lượng</td>
            <td><input type="text" 
                       name="soluong" 
                       value="<?php echo $row['quantity']; ?>" 
                       required></td>
        </tr>

        <tr>
            <!-- <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh">
                <br>
                <img src="modules/quanlisanpham/uploads/<?php echo $row['image']; ?>" 
                     width="120">
            </td> -->
            <tr>
    <td>Hình ảnh</td>
    <td>
        <input type="file" name="hinhanh[]" multiple>
        <br>
        <?php
        $sql_img = "SELECT * FROM tbl_product_images WHERE id_product=$id";
        $query_img = mysqli_query($conn, $sql_img);
        while($img = mysqli_fetch_array($query_img)){
        ?>
            <img src="modules/quanlisanpham/uploads/<?php echo $img['image']; ?>"
                 width="80">
        <?php } ?>
    </td>
</tr>

        </tr>

        <tr>
            <td>Danh mục</td>
            <td>
                <select name="danhmuc" id="">
                    <?php 
                        $sql_danhmuc ="SELECT * FROM tbl_categories ORDER BY id_category DESC";
                        $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                            if($row_danhmuc['id_category']==$row['id_category']){
                    ?>
                    <option selected value="<?php echo $row_danhmuc['id_category'] ?>"><?php echo $row_danhmuc['name'] ?></option>
                    <?php 
                            }else{
                    ?>
                    <option value="<?php echo $row_danhmuc['id_category'] ?>"><?php echo $row_danhmuc['name'] ?></option>
                    <?php 
                            }
                        }
                    ?>
                </select>    
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" name="suasanpham" value="Cập nhật sản phẩm">
            </td>
        </tr>
    </table>
</form>
<head>
    <link rel="stylesheet" href="css/quanlisanpham.css">
</head>