<?php
if(!isset($conn)) {
    include("config/config.php");
}

if(!isset($_GET['tukhoa']) || empty(trim($_GET['tukhoa']))){
    echo "<p>Vui lòng nhập từ khóa để tìm kiếm.</p>";
    return;
}

$tukhoa = trim($_GET['tukhoa']);

$sql = "
SELECT 
    p.*,

    -- Ảnh mặc định
    (
        SELECT image 
        FROM tbl_product_images 
        WHERE id_product = p.id_product 
        ORDER BY id_image ASC 
        LIMIT 1
    ) AS image_default,

    -- Ảnh hover (ảnh thứ 2)
    (
        SELECT image 
        FROM tbl_product_images 
        WHERE id_product = p.id_product 
        ORDER BY id_image ASC 
        LIMIT 1 OFFSET 1
    ) AS image_hover

FROM tbl_products p
WHERE p.name_product LIKE '%$tukhoa%'
   OR p.description LIKE '%$tukhoa%'
";

$query = mysqli_query($conn, $sql);

echo "<h5 class='search-title'>
        Kết quả tìm kiếm cho: 
        <span>'".htmlspecialchars($tukhoa)."'</span>
      </h5>";

if(mysqli_num_rows($query) > 0){
    echo '<ul class="product-list">';
    while($row = mysqli_fetch_array($query)){
?>
        <li class="product-item">
            <a href="index.php?quanli=sanpham&id=<?php echo $row['id_product']; ?>">

                <div class="product-image">

                    <img class="img-default"
                         src="admincp/modules/quanlisanpham/uploads/<?php echo $row['image_default']; ?>"
                         alt="">

                    <?php if(!empty($row['image_hover'])){ ?>
                        <img class="img-hover"
                             src="admincp/modules/quanlisanpham/uploads/<?php echo $row['image_hover']; ?>"
                             alt="">
                    <?php } ?>

                    <div class="icons">
                        <span class="icon zoom">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <span class="icon add" data-id="<?php echo $row['id_product']; ?>">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    </div>

                </div>

                <div class="item">
                    <span class="name">
                        <?php echo htmlspecialchars($row['name_product']); ?>
                    </span>
                    <span class="price">
                        <?php echo number_format($row['price'], 0, ',', '.'); ?> VNĐ
                    </span>
                </div>

            </a>
        </li>
<?php
    }
    echo '</ul>';
} else {
    echo "<p>Không tìm thấy sản phẩm nào.</p>";
}
?>
<head>
    <link rel="stylesheet" href="css/search.css">
</head>