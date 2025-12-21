<?php


if(isset($_GET['logout'])){
    session_destroy();
    header("Location:index.php?quanli=taikhoan");
    exit();
}

if(!isset($_SESSION['dangnhap'])){
    header("Location:index.php?quanli=taikhoan");
    exit();
}

$email = $_SESSION['dangnhap'];
$sql = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
$result = mysqli_query($conn, $sql);
if($result && mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);
} else {
    session_destroy();
    header("Location:index.php?quanli=taikhoan");
    exit();
}
?>

<div class="account-wrapper">
<h2>Tài khoản của tôi</h2>
<div class="account-header">
    <div class="account-info">       
        <p>👤 <?= htmlspecialchars($user['name_user']) ?></p>
        <p>📧 <?= htmlspecialchars($user['email']) ?></p>
        <p>📞 <?= htmlspecialchars($user['phone']) ?></p>
        <p>🏠 <?= htmlspecialchars($user['address']) ?></p>
    </div>

<a class="logout-btn" href="index.php?quanli=taikhoan&logout=1">Đăng xuất</a>
</div>      

<h2>Đơn hàng của tôi</h2>

<?php
$id_user = $user['id_user'];

$sql_orders = "SELECT * FROM tbl_orders WHERE id_user = $id_user ORDER BY created_at DESC";
$query_orders = mysqli_query($conn, $sql_orders);

if(mysqli_num_rows($query_orders) > 0){
    echo '<table class="order-table">
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Ngày tạo</th>
                <th>Tổng tiền</th>
                <th>Thanh toán</th>
                <th>Trạng thái</th>
                <th>Chi tiết</th>
            </tr>';
    $i = 0;
    while($order = mysqli_fetch_assoc($query_orders)){
        $i++;
        echo '<tr>
                <td>'.$i.'</td>
                <td>'.$order['id_order'].'</td>
                <td>'.$order['created_at'].'</td>
                <td>'.number_format($order['total_price'],0,',','.').' VNĐ</td>
                <td>'.$order['payment_method'].'</td>
                <td>'.$order['status'].'</td>
                <td><a class="view-detail" href="index.php?quanli=taikhoan&order_detail='.$order['id_order'].'">Xem</a></td>
              </tr>';
    }
    echo '</table>';
} else {
    echo '<p>Bạn chưa có đơn hàng nào.</p>';
}

if(isset($_GET['order_detail'])){
    $id_order = intval($_GET['order_detail']);
    
    $sql_detail = "SELECT od.*, p.name_product, p.code_product 
                   FROM tbl_order_details od
                   JOIN tbl_products p ON od.id_product = p.id_product
                   WHERE od.id_order = $id_order";
    $query_detail = mysqli_query($conn, $sql_detail);

    if(mysqli_num_rows($query_detail) > 0){
        echo '<h3 class="order-detail-title">Chi tiết đơn hàng #'.$id_order.'</h3>';
        echo '<table class="order-detail-table">
                <tr>
                    <th>STT</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>';
        $j = 0;
        while($detail = mysqli_fetch_assoc($query_detail)){
            $j++;
            $thanh_tien = $detail['quantity'] * $detail['price'];
            echo '<tr>
                    <td>'.$j.'</td>
                    <td>'.$detail['code_product'].'</td>
                    <td>'.$detail['name_product'].'</td>
                    <td>'.$detail['quantity'].'</td>
                    <td>'.number_format($detail['price'],0,',','.').' VNĐ</td>
                    <td>'.number_format($thanh_tien,0,',','.').' VNĐ</td>
                  </tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Chi tiết đơn hàng trống.</p>';
    }
}
?>
</div>
<head>
    <link rel="stylesheet" href="css/account.css">
</head>
