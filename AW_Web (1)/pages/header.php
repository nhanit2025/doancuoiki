

<header>
        <div class="logo">
            <a href="index.php"><img src="/AW_Web/images/Logo.png" alt=""></a>
        </div>

        <nav class="menu">
            <a href="index.php?quanli=danhmucsanpham">Shop</a>
            <a href="index.php?quanli=gioithieu">Giới Thiệu</a>
            <a href="index.php?quanli=lienhe">Liên Hệ</a>
        </nav>
        <div class="menu-toggle" id="menu-toggle">
    <i class="fa-solid fa-bars"></i>
</div>
        <div class="others">
    <div class="search-container">
        <a href="#" id="search-icon"><i class="fa-solid fa-magnifying-glass"></i></a>

        <form id="search-form" action="index.php" method="GET">
            <input type="hidden" name="quanli" value="timkiem">
            <input type="text" name="tukhoa" placeholder="Nhập từ khóa..." required>
            <button type="submit">Tìm</button>
        </form>
    </div>
    <a href="index.php?quanli=taikhoan"><i class="fa-regular fa-user"></i></a>
    <a href="index.php?quanli=giohang"><i class="fa-solid fa-bag-shopping"></i></a>
</div>

</header>
<link rel="stylesheet" href="/AW_Web/css/search.css">
<script src="/AW_Web/js/search.js"></script>