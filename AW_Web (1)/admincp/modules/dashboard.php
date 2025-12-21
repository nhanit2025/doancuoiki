<div class="admin-welcome">
    <h3>Welcome to admin</h3>
    <strong>
        <?php
        if (isset($_SESSION['admin_login'])) {
            echo $_SESSION['admin_login'];
        }
        ?>
    </strong>
</div>