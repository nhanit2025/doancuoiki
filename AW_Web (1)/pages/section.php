    <section>
        <?php 
            if(isset($_GET['quanli'])){
                $tam= $_GET['quanli'];
            } else{
                $tam= '';
            }
            if($tam== 'danhmucsanpham'){
                include("section/danhmuc.php");

            } elseif($tam== 'gioithieu'){
                include("section/gioithieu.php");

            }elseif($tam== 'lienhe'){
                include("section/lienhe.php");

            }elseif($tam== 'giohang'){
                include("section/giohang.php");

            }elseif($tam== 'taikhoan'){
                include("section/taikhoan.php");
                
            }elseif($tam== 'sanpham'){
                include("section/sanpham.php");

            }elseif($tam== 'dangky'){
                include("section/dangki.php");
                
            }elseif($tam== 'timkiem'){
                include("section/timkiem.php");
            }else{
                include("section/index.php");
            }
        ?>
    </section>