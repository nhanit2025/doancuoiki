<?php
if(!isset($_SESSION)) session_start();

if(isset($_SESSION['dangnhap'])){
    include("pages/main/taikhoan_user.php");
    
} else {
    include("pages/main/dangnhap.php");
}
?>
