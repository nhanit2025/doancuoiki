<?php
if (!isset($_GET['id'])) {
    echo "Không tìm thấy sản phẩm!";
    exit();
}

$id = intval($_GET['id']);

$sql_chitiet = "
SELECT p.*, c.name AS category_name
FROM tbl_products p
JOIN tbl_categories c ON p.id_category = c.id_category
WHERE p.id_product = $id
LIMIT 1
";
$query_chitiet = mysqli_query($conn, $sql_chitiet);
$row = mysqli_fetch_array($query_chitiet);

$sql_img = "SELECT * FROM tbl_product_images WHERE id_product = $id";
$query_img = mysqli_query($conn, $sql_img);
?>

<div class="wapper_chitiet">

    <div class="image_product">

        <?php
        $img_first = mysqli_fetch_array($query_img);
        ?>
        <img id="mainImage"
             width="50%"
             src="admincp/modules/quanlisanpham/uploads/<?php echo $img_first['image']; ?>"
             alt="">

        
        <div class="image_gallery">
            <?php
            mysqli_data_seek($query_img, 0);
            while($img = mysqli_fetch_array($query_img)){
            ?>
                <img class="thumb"
                     src="admincp/modules/quanlisanpham/uploads/<?php echo $img['image']; ?>"
                     onclick="changeImage(this.src)">
            <?php } ?>
        </div>

    </div>

    <form method="POST"
          action="pages/main/themgiohang.php?idsanpham=<?php echo $row['id_product']; ?>">

    <div class="detail_product">
        <a href="index.php"><span>Home</span></a>
        <span>/</span>
        <a href="index.php?quanli=danhmucsanpham"><span>Shop</span></a>

        <h3><?php echo $row['name_product']; ?></h3>

        <p>Giá</p>
        <p class="price">
            <?php echo number_format($row['price'],0,',','.').' VNĐ'; ?>
        </p>

        <p>Số lượng</p>
        <div class="quantity_box">
            <button type="button" class="qty_btn" onclick="giamSoLuong()">−</button>
            <input type="number" id="quantity" name="quantity" value="1" min="1">
            <button type="button" class="qty_btn" onclick="tangSoLuong()">+</button>
        </div>

        <p>
            <input type="submit"
                   name="themgiohang"
                   class="addtocard"
                   value="Thêm vào giỏ hàng">
        </p>

        <p style="font-weight: bold;">Chi tiết</p>
        <p><?= nl2br(htmlspecialchars($row['description'])); ?></p>
    </div>

    </form>
</div>

<script>
function changeImage(src) {
    document.getElementById('mainImage').src = src;
}
</script>
