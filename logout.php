<?php
session_start();

if (isset($_SESSION['userid'])) {
    session_destroy(); 
    echo '<script>alert("로그아웃 되었습니다."); window.location.href="main.php";</script>';
} else {
    echo '<script>alert("로그인이 되어 있지 않습니다."); window.location.href="login.html";</script>';
}
exit();
?>
