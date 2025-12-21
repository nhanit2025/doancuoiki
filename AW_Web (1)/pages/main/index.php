<?php
$sql_sanpham = "
SELECT 
    p.*, 
    c.name AS category_name,

    -- Ảnh mặc định
    (
        SELECT image 
        FROM tbl_product_images 
        WHERE id_product = p.id_product 
        ORDER BY id_image ASC 
        LIMIT 1
    ) AS image_default,

    -- Ảnh hover (ảnh thứ 2 nếu có)
    (
        SELECT image 
        FROM tbl_product_images 
        WHERE id_product = p.id_product 
        ORDER BY id_image ASC 
        LIMIT 1 OFFSET 1
    ) AS image_hover

FROM tbl_products p
JOIN tbl_categories c ON p.id_category = c.id_category
ORDER BY p.id_product DESC
LIMIT 4
";

$query_sanpham = mysqli_query($conn, $sql_sanpham);
?>

<h1>AlwaysWonder</h1>

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
                <span class="price">
                    <?php echo number_format($row['price'], 0, ',', '.'); ?> VNĐ
                </span>
            </div>

        </a>
    </li>
<?php } ?>
</ul>
