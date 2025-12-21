<?php
session_start();
include('../../admincp/config/config.php');

if(!isset($_SESSION['dangnhap'])){
    header("Location: ../../index.php?quanli=dangky");
    exit();
}

$email = $_SESSION['dangnhap'];
$sql_user = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
$query_user = mysqli_query($conn, $sql_user);
if(mysqli_num_rows($query_user) == 0){
    echo "Không tìm thấy thông tin người dùng!";
    exit();
}
$user = mysqli_fetch_assoc($query_user);
$id_user = $user['id_user'];

if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
    echo "<p>Giỏ hàng trống!</p>";
    exit();
}

if(isset($_POST['dathang'])){
    $total_price = 0;
    foreach($_SESSION['cart'] as $item){
        $total_price += $item['gia'] * $item['soluong'];
    }

    $sql_order = "INSERT INTO tbl_orders (id_user, total_price, payment_method, status)
                  VALUES ($id_user, $total_price, 'COD', 'Chưa xử lý')";
    mysqli_query($conn, $sql_order) or die(mysqli_error($conn));
    $id_order = mysqli_insert_id($conn);

    foreach($_SESSION['cart'] as $item){
        $id_product = $item['id'];
        $quantity   = $item['soluong'];
        $price      = $item['gia'];
        $sql_detail = "INSERT INTO tbl_order_details (id_order, id_product, quantity, price)
                       VALUES ($id_order, $id_product, $quantity, $price)";
        mysqli_query($conn, $sql_detail) or die(mysqli_error($conn));
    }

    unset($_SESSION['cart']);

    header("Location: ../../index.php?quanli=donhang&status=success");
    exit();
}
?>

<h2>Thanh toán</h2>
<p>Xin chào, <strong><?= htmlspecialchars($user['name_user']) ?></strong>! Vui lòng kiểm tra giỏ hàng trước khi đặt hàng.</p>

<form method="POST">
<table border="1" width="90%" style="text-align:center;">
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
    $i = 0;
    $tong_tien = 0;
    foreach($_SESSION['cart'] as $item){
        $i++;
        $thanh_tien = $item['gia'] * $item['soluong'];
        $tong_tien += $thanh_tien;
    ?>
    <tr>
        <td><?= $i ?></td>
        <td><?= htmlspecialchars($item['tensanpham']) ?></td>
        <td><?= $item['soluong'] ?></td>
        <td><?= number_format($item['gia'],0,',','.') ?> VNĐ</td>
        <td><?= number_format($thanh_tien,0,',','.') ?> VNĐ</td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="4"><strong>Tổng tiền</strong></td>
        <td><strong><?= number_format($tong_tien,0,',','.') ?> VNĐ</strong></td>
    </tr>
</table>

<p>
    <input type="submit" name="dathang" value="Đặt hàng">
</p>
</form>
