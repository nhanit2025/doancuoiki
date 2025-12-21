<?php
if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {
    unset($_SESSION['admin_login']);
    header('Location:login.php');
    exit();
}
?>

<div class="menu">
    <h2><a href="index.php">Control Panel</a></h2>
    <ul class="admincp-list">
        <li><a href="index.php?action=quanlidanhmuc&query=them">Danh mục</a></li>
        <li><a href="index.php?action=quanlisanpham&query=them">Sản phẩm</a></li>
        <li><a href="index.php?action=quanlikhachhang&query=them">Khách hàng</a></li>
        <li><a href="index.php?action=quanlidonhang&query=them">Đơn hàng</a></li>
        <li>
    
</li>

    </ul>
</div>
