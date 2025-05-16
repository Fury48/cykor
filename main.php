<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
</head>
<body>
    <div>
        <a href="main.php">main</a>
        <a href="login.html">login</a>
        <a href="signin.html">sign in</a>
        <a href="logout.php">log out</a>
    </div>
    <div>
        <?php if (isset($_SESSION['userid'])): ?>
            <p>환영합니다, <?php echo ($_SESSION['userid']); ?>님!</p>
        <?php else: ?>
            <p>로그인이 필요합니다.</p>
        <?php endif; ?>
    </div>

    
</body>
</html>