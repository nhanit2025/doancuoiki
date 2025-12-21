<h2>Thêm sản phẩm</h2>

<form method="POST"
      action="modules/quanlisanpham/xuli.php"
      enctype="multipart/form-data">

<table>
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="tensanpham" required></td>
    </tr>

    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" name="masp" required></td>
    </tr>

    <tr>
        <td>Giá</td>
        <td><input type="text" name="gia" required></td>
    </tr>

    <tr>
        <td>Nội dung</td>
        <td><textarea name="noidung"></textarea></td>
    </tr>

    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong" required></td>
    </tr>

    <tr>
        <td>Hình ảnh</td>
        <td>
            <input type="file" name="hinhanh[]" multiple required>
        </td>
    </tr>

    <tr>
        <td>Danh mục</td>
        <td>
            <select name="danhmuc">
                <?php
                $sql = "SELECT * FROM tbl_categories";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($query)){
                ?>
                    <option value="<?php echo $row['id_category']; ?>">
                        <?php echo $row['name']; ?>
                    </option>
                <?php } ?>
            </select>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="submit" name="themsanpham" value="Thêm sản phẩm">
        </td>
    </tr>
</table>
</form>
<head>
    <link rel="stylesheet" href="css/quanlisanpham.css">
</head>