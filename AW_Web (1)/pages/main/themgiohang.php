<?php
session_start();
include('../../admincp/config/config.php');

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) {
        return is_array($item) && isset($item['id']);
    });
} else {
    unset($_SESSION['cart']);
}

if (isset($_SESSION['cart']) && isset($_GET['tang'])) {
    $id = (int)$_GET['tang'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if (!is_array($item)) continue;

        if ($item['id'] == $id) {
            $_SESSION['cart'][$key]['soluong']++;
            break;
        }
    }

    header('Location:../../index.php?quanli=giohang');
    exit();
}

if (isset($_SESSION['cart']) && isset($_GET['giam'])) {
    $id = (int)$_GET['giam'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if (!is_array($item)) continue;

        if ($item['id'] == $id) {
            if ($_SESSION['cart'][$key]['soluong'] > 1) {
                $_SESSION['cart'][$key]['soluong']--;
            } else {
                unset($_SESSION['cart'][$key]); 
            }
            break;
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);

    header('Location:../../index.php?quanli=giohang');
    exit();
}


if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
    $id = (int)$_GET['xoa'];

    foreach ($_SESSION['cart'] as $key => $cart_item) {
        if (!is_array($cart_item)) continue;
        if ($cart_item['id'] == $id) {
            unset($_SESSION['cart'][$key]);
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header('Location:../../index.php?quanli=giohang');
    exit();
}

if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanli=giohang');
    exit();
}

if (isset($_POST['themgiohang'])) {
    $id = (int)$_GET['idsanpham'];
    $soluong = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    $sql = "SELECT * FROM tbl_products WHERE id_product='$id' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        $new_product = [
            'id' => $id,
            'tensanpham' => $row['name_product'],
            'soluong' => $soluong,
            'gia' => $row['price'],
            'hinhanh' => $row['image'],
            'masp' => $row['code_product']
        ];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $found = false;
        foreach ($_SESSION['cart'] as $key => $item) {
            if (!is_array($item) || !isset($item['id'])) continue;

            if ($item['id'] == $id) {
                $_SESSION['cart'][$key]['soluong'] += $soluong;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $_SESSION['cart'][] = $new_product;
        }
    }

    header('Location:../../index.php?quanli=giohang');
    exit();
}
