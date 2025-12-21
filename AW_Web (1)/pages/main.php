<main>
    <div class="main-content">
        <?php 
            if(isset($_GET['quanli'])){
                $tam= $_GET['quanli'];
            } else{
                $tam= '';
            }
            if($tam== 'danhmucsanpham'){
                include("main/danhmuc.php");
            } elseif($tam== 'sanpham'){
                include("main/sanpham.php");
            } elseif($tam== 'gioithieu'){
                include("main/gioithieu.php");
            }elseif($tam== 'lienhe'){
                include("main/lienhe.php");
            }elseif($tam== 'giohang'){
                include("main/giohang.php");
            }elseif($tam== 'dangky'){
                include("main/dangky.php");
            // }elseif($tam== 'dangnhap'){
            //     include("main/dangnhap.php");
            }elseif($tam== 'taikhoan'){
                include("main/taikhoan.php");
            }elseif($tam == 'timkiem'){
                include("main/timkiem.php");
            }else{
                include("main/index.php");
            }
        ?>
    </div>
    
</main>