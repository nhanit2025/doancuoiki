<?php
session_start();
include('../../admincp/config/config.php');

header('Content-Type: application/json');

if (!isset($_POST['id_product'])) {
    echo json_encode(['success' => false]);
    exit;
}

$id = (int)$_POST['id_product'];

$sql = "
SELECT p.*,
    (
        SELECT image 
        FROM tbl_product_images 
        WHERE id_product = p.id_product 
        ORDER BY id_image ASC 
        LIMIT 1
    ) AS hinhanh
FROM tbl_products p
WHERE p.id_product = $id
LIMIT 1
";

$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

if (!$row) {
    echo json_encode(['success' => false]);
    exit;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['id'] == $id) {
        $item['soluong']++;
        $found = true;
        break;
    }
}

if (!$found) {
    $_SESSION['cart'][] = [
        'id' => $id,
        'tensanpham' => $row['name_product'],
        'soluong' => 1,
        'gia' => $row['price'],
        'hinhanh' => $row['hinhanh'], 
        'masp' => $row['code_product']
    ];
}

echo json_encode([
    'success' => true,
    'total' => count($_SESSION['cart'])
]);
exit;
?>
