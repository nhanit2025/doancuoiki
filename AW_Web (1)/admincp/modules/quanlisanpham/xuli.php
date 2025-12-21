<?php
    include('../../config/config.php');

    $tensanpham = $_POST['tensanpham'] ?? '';
    $masanpham  = $_POST['masp'] ?? '';
    $giasanpham = $_POST['gia'] ?? '';
    $soluong    = $_POST['soluong'] ?? '';
    $noidung    = $_POST['noidung'] ?? '';
    $danhmuc    = $_POST['danhmuc'] ?? '';


    if (isset($_POST['themsanpham'])) {

    $sql = "INSERT INTO tbl_products
            (name_product, code_product, price, quantity, description, id_category)
            VALUES
            ('$tensanpham','$masanpham','$giasanpham','$soluong','$noidung','$danhmuc')";
    mysqli_query($conn, $sql);

    $id_product = mysqli_insert_id($conn);

    foreach ($_FILES['hinhanh']['name'] as $key => $value) {
        if ($value != '') {
            $filename = time().'_'.$value;
            move_uploaded_file($_FILES['hinhanh']['tmp_name'][$key],
                               'uploads/'.$filename);

            mysqli_query($conn,
                "INSERT INTO tbl_product_images(id_product, image)
                 VALUES ($id_product, '$filename')");
        }
    }

    header("Location: ../../index.php?action=quanlisanpham&query=them");
    exit();
}




elseif (isset($_POST['suasanpham'])) {

    $id = intval($_GET['id_product']);

    mysqli_query($conn,
        "UPDATE tbl_products SET
        name_product='$tensanpham',
        code_product='$masanpham',
        price='$giasanpham',
        quantity='$soluong',
        description='$noidung',
        id_category='$danhmuc'
        WHERE id_product=$id"
    );

    if (!empty($_FILES['hinhanh']['name'][0])) {
        foreach ($_FILES['hinhanh']['name'] as $key => $value) {
            $filename = time().'_'.$value;
            move_uploaded_file($_FILES['hinhanh']['tmp_name'][$key],
                               'uploads/'.$filename);

            mysqli_query($conn,
                "INSERT INTO tbl_product_images(id_product, image)
                 VALUES ($id, '$filename')");
        }
    }

    header("Location: ../../index.php?action=quanlisanpham&query=them");
    exit();
}

 
else {
    $id = intval($_GET['id_product']);

    $sql_img = "SELECT * FROM tbl_product_images WHERE id_product=$id";
    $query_img = mysqli_query($conn, $sql_img);
    while($row = mysqli_fetch_array($query_img)){
        unlink('uploads/'.$row['image']);
    }

    mysqli_query($conn, "DELETE FROM tbl_products WHERE id_product=$id");

    header("Location: ../../index.php?action=quanlisanpham&query=them");
    exit();
}
