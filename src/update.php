<?php
session_start();

$host = 'db'; 
$username = 'exampleuser'; 
$password = 'examplepass';
$database = 'cykor'; 

$dbconn = new mysqli($host,$username,$password,$database);
if(!$dbconn) die("DB연결 실패");

$unid = $_GET['unid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $context = $_POST['context'];

    $update = "UPDATE board SET title='$title', context='$context' WHERE unid='$unid'";
    $result = $dbconn->query($update);
    if($dbconn->query($update)==TRUE) {
        echo "<script>alert('게시글 수정이 완료되었습니다.');window.location.href='board.php?unid=" . $unid . "';</script>";
    } else {
        echo "<script>alert('게시글 수정에 실패했습니다.');window.location.href='board.php?unid=" . $unid . "';</script>";
    }
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
        <form action = "" method = "post">
            <span>글 제목</span>
            <input type = "text" name = "title" maxlength="100"><br>
            <span>글 내용</span>
            <input type = "text" name = "context" maxlength="1000"><br>
            <button type= "submit">수정하기</button>
        </form>
    </div>
</body>
</html>