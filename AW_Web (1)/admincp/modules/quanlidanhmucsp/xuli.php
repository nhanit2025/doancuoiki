<?php
    include('../../config/config.php');

    $tenloaisp = $_POST['tendanhmuc'] ?? '';
    $thutu = $_POST['thutu'] ?? '';

    
    if (isset($_POST['themdanhmuc'])) {

        $sql_them = "INSERT INTO tbl_categories(name, thutu)
                     VALUES ('".$tenloaisp."', '".$thutu."')";

        mysqli_query($conn, $sql_them) or die("Lỗi SQL: " . mysqli_error($conn));

        header("Location: ../../index.php?action=quanlidanhmuc&query=them");
        exit();
    }

    
    elseif (isset($_POST['suadanhmuc'])) {

        $id = intval($_GET['id_category']);

        $sql_update = "UPDATE tbl_categories 
                       SET name = '".$tenloaisp."', thutu = '".$thutu."'
                       WHERE id_category = '".$id."'";

        mysqli_query($conn, $sql_update) or die("Lỗi SQL: " . mysqli_error($conn));

        header("Location: ../../index.php?action=quanlidanhmuc&query=them");
        exit();
    }

    
    else {
        $id = intval($_GET['id_category']);

        $sql_xoa = "DELETE FROM tbl_categories WHERE id_category = '".$id."'";

        mysqli_query($conn, $sql_xoa);

        header("Location: ../../index.php?action=quanlidanhmuc&query=them");
        exit();
    }
?>
