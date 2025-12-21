<table class="cart-table" style="width: 100%; height: auto; text-align: center;">
    <tr>
        <th>ID</th>
        <th>Mã</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Thành tiền</th>
        <th>Quản lí</th>
    </tr>

<?php
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
    $i = 0;
    $tong_tien = 0;
    foreach($_SESSION['cart'] as $cart_item){
        $thanh_tien = $cart_item['soluong'] * $cart_item['gia'];
        $tong_tien += $thanh_tien;
        $i++;
?>

    <tr>
        <td><?= $i ?></td>
        <td><?= $cart_item['masp'] ?></td>
        <td><?= $cart_item['tensanpham'] ?></td>
        <td>
            <?php if(!empty($cart_item['hinhanh'])): ?>
                <img src="admincp/modules/quanlisanpham/uploads/<?= $cart_item['hinhanh'] ?>" width="80" >
            <?php endif; ?>
        </td>
        <td>
            <a href="pages/main/themgiohang.php?tang=<?= $cart_item['id'] ?>">+</a>
            <?= $cart_item['soluong'] ?>
            <a href="pages/main/themgiohang.php?giam=<?= $cart_item['id'] ?>">-</a>
        </td>
        <td><?= number_format($cart_item['gia'],0,',','.') ?> VNĐ</td>
        <td><?= number_format($thanh_tien,0,',','.') ?> VNĐ</td>
        <td><a href="pages/main/themgiohang.php?xoa=<?= $cart_item['id'] ?>">Xóa</a></td>
    </tr>
<?php
    }
?>
    <tr>
        <td colspan="8" class="cart-summary">
            <p style="float:left;">Tổng tiền: <?= number_format($tong_tien,0,',','.') ?> VNĐ</p>
            <p style="float:right;"><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></p>
            <div style="clear:both;"></div>
            
            <?php if(isset($_SESSION['dangnhap'])): ?>
                <p><a href="pages/main/thanhtoan.php">Đặt Hàng</a></p>
            <?php else: ?>
                <p><a href="index.php?quanli=dangky">Đăng ký</a></p>
            <?php endif; ?>
        </td>
    </tr>

<?php
} else {
    
?>
    <tr>
        <td colspan="8" class="cart-empty"><p>Hiện tại giỏ hàng trống</p></td>
    </tr>
<?php
}
?>
</table>

<head>
    <link rel="stylesheet" href="css/cart.css">
</head>