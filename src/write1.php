<?php
session_start();

$host = 'db'; 
$username = 'exampleuser'; 
$password = 'examplepass';
$database = 'cykor'; 

$dbconn = new mysqli($host,$username,$password,$database);
if(!$dbconn) die("DB연결 실패");

if (!isset($_SESSION['userid'])) {
    echo "<script>alert('로그인이 필요합니다.'); window.location.href='login.html';</script>";
    exit;
}
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
        <form action = "write2.php" method = "post">
            <span>글 제목</span>
            <input type = "text" name = "title" maxlength="100"><br>
            <span>글 내용</span>
            <input type = "text" name = "context" maxlength="1000"><br>
            <button>게시하기</button>
        </form>
    </div>
</body>
</html>