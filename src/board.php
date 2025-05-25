<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cykor';

$dbconn = new mysqli($host,$username,$password,$database);
if(!$dbconn) die("DB연결 실패");
//게시글 가져오기
$list = "SELECT unid, title, context, writer FROM board";
$result = $dbconn->query($list);

$unid = $_GET['unid'];
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
        <?php 
        $page = "SELECT * FROM board WHERE unid = $unid";
        $result = $dbconn->query($page);
        $row = $result->fetch_assoc();
        echo "<h4>".$row['title']."</h4>";
        echo "<p>".$row['context']."</p>";
        ?>
    </div>
    <div>
        <?php
        if (isset($_SESSION['userid'])){
            if($_SESSION['userid'] == $row['writer']) {
                echo "<button onclick=\"location.href='update.php?unid=$unid'\">수정</button>";
                echo "<button onclick=\"location.href='delete.php?unid=$unid'\">삭제</button>";
            }
        }
        ?>
    </div>
    <br><h5>댓글</h5>
    <div>
        <?php
        if(isset($_SESSION['userid'])) {  
            $writer = 1; 
        } else {  
            $writer = 0;  
        }
        echo "<span>댓글쓰기</span> <input type = \"text\" name = \"comments\" maxlength=\"500\"><br>";
        echo "<button onclick=\"location.href='update.php?unid=$unid&writer=$writer'\">댓글 작성</button>";
        ?>
    </div>
</body>
</html>