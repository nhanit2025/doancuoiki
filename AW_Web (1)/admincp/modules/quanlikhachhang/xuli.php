<?php
session_start();
include('../../config/config.php');



$name_user  = $_POST['name_user']  ?? '';
$email      = $_POST['email']      ?? '';
$password   = $_POST['u_password'] ?? '';
$phone      = $_POST['phone']      ?? '';
$address    = $_POST['address']    ?? '';


if(isset($_POST['themkhachhang'])){
    
    $check_sql = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
    $check_query = mysqli_query($conn, $check_sql);
    if(mysqli_num_rows($check_query) > 0){
        echo "<script>alert('Email đã tồn tại!'); window.history.back();</script>";
        exit();
    }

    $sql = "INSERT INTO tbl_user (name_user, email, u_password, phone, address) 
            VALUES ('$name_user', '$email', '$password', '$phone', '$address')";
    mysqli_query($conn, $sql) or die("Lỗi SQL: ".mysqli_error($conn));
    header("Location: ../../index.php?action=quanlikhachhang&query=them");
    exit();
}

 

elseif(isset($_POST['suakhachhang'])){
    if(!isset($_GET['id_user'])){
        die("Không tìm thấy ID khách hàng!");
    }
    $id_user = intval($_GET['id_user']);
    $sql = "UPDATE tbl_user SET 
            name_user='$name_user', 
            email='$email', 
            u_password='$password', 
            phone='$phone', 
            address='$address' 
            WHERE id_user=$id_user";
    mysqli_query($conn, $sql) or die("Lỗi SQL: ".mysqli_error($conn));
    header("Location: ../../index.php?action=quanlikhachhang&query=them");
    exit();
}


elseif(isset($_GET['id_user'])){
    $id_user = intval($_GET['id_user']);
    $sql = "DELETE FROM tbl_user WHERE id_user=$id_user";
    mysqli_query($conn, $sql) or die("Lỗi SQL: ".mysqli_error($conn));
    header("Location: ../../index.php?action=quanlikhachhang&query=them");
    exit();
}
