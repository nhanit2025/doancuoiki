<?php
include('../../config/config.php');


if(isset($_POST['suaorder']) && isset($_GET['id_order'])){
    $id_order = intval($_GET['id_order']);
    $status = $_POST['status'];

    $sql = "UPDATE tbl_orders SET status='$status' WHERE id_order=$id_order";
    mysqli_query($conn, $sql) or die("Lỗi SQL: ".mysqli_error($conn));

    header("Location: ../../index.php?action=quanlidonhang&query=them");
    exit();
}


elseif(isset($_GET['id_order'])){
    $id_order = intval($_GET['id_order']);

    
    mysqli_query($conn, "DELETE FROM tbl_order_items WHERE id_order=$id_order");

    
    mysqli_query($conn, "DELETE FROM tbl_orders WHERE id_order=$id_order");

    header("Location: ../../index.php?action=quanlidonhang&query=them");
    exit();
}
?>
