
<?php
$selected_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql_sanpham = "
SELECT 
    p.*,

    -- Ảnh đầu tiên
    (
        SELECT image 
        FROM tbl_product_images 
        WHERE id_product = p.id_product 
        ORDER BY id_image ASC 
        LIMIT 1
    ) AS image_default,

    -- Ảnh thứ 2 (hover)
    (
        SELECT image 
        FROM tbl_product_images 
        WHERE id_product = p.id_product 
        ORDER BY id_image ASC 
        LIMIT 1 OFFSET 1
    ) AS image_hover

FROM tbl_products p
" . ($selected_id > 0 ? "WHERE p.id_category = $selected_id" : "") . "
ORDER BY p.id_product DESC
";

$query_sanpham = mysqli_query($conn, $sql_sanpham);
?>

<ul class="product-list">
<?php while($row = mysqli_fetch_array($query_sanpham)) { ?>
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
                <span class="name"><?php echo $row['name_product']; ?></span>
                <span class="price"><?php echo number_format($row['price']); ?> VNĐ</span>
            </div>

        </a>
    </li>
<?php } ?>
</ul>
