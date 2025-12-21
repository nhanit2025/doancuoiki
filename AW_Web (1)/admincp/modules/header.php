<header>
    <h1>Admin_AW</h1>
    <a href="index.php?action=dangxuat" >
        Đăng xuất:
        <strong>
            <?php
            if (isset($_SESSION['admin_login'])) {
                echo $_SESSION['admin_login'];
            }
            ?>
        </strong>
    </a>
</header>