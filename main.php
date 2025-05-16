<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cykor';

$dbconn = new mysqli($host,$username,$password,$database);
if(!$dbconn) die("DB연결 실패");
//게시글 가져오기
$list = "SELECT unid, title, writer FROM board";
$result = $dbconn->query($list);

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
    <div>
        <?php if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
                $title = $row['title'];
                echo "<a href='board.php?title=".urlencode($title)."'>".$title."</a>";
            }
            }else{
                echo"게시글이 없습니다.";
            }
        ?>
    </div>
    
</body>
</html>