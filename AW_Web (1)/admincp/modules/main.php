<main>
    <div class="main-content">
        <?php 
            if(isset($_GET['action']) && isset($_GET['query'])){
                $tam= $_GET['action'];
                $query= $_GET['query'];
            } else{
                $tam= '';
                $query= '';
            }
            if($tam== 'quanlidanhmuc' && $query=='them'){
                include("modules/quanlidanhmucsp/them.php");
                include("modules/quanlidanhmucsp/lietke.php");
            }elseif($tam== 'quanlidanhmuc' && $query=='sua'){
                include("modules/quanlidanhmucsp/sua.php");

            }elseif($tam== 'quanlisanpham' && $query=='them'){
                include("modules/quanlisanpham/them.php");
                include("modules/quanlisanpham/lietke.php"); 
            }elseif($tam== 'quanlisanpham' && $query=='sua'){
                include("modules/quanlisanpham/sua.php");
            
            } elseif($tam== 'quanlikhachhang' && $query=='them'){
                include("modules/quanlikhachhang/them.php");
                include("modules/quanlikhachhang/lietke.php");
            } elseif($tam== 'quanlikhachhang' && $query=='sua'){
                include("modules/quanlikhachhang/sua.php");

            } elseif($tam == 'quanlidonhang' && $query == 'them'){
                include("modules/quanlidonhang/lietke.php");
            } elseif($tam == 'quanlidonhang' && $query == 'sua'){
                include("modules/quanlidonhang/sua.php");
            }else{
                include("modules/dashboard.php");
            }
        ?>
    </div>
    
</main>