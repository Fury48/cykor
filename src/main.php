<?php
session_start();
$host = 'db'; 
$username = 'exampleuser'; 
$password = 'examplepass';
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
    <br><h3>게시글 목록</h3>
    <div>
        <?php if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
                $title = $row['title'];
                $unid = $row['unid'];
                echo "<a href='board.php?unid=".$unid."'>".$title."</a><br>";
            }
            }else{
                echo"게시글이 없습니다.";
            }
        ?>
    </div>
    <div>
        <form action = "write1.php" method = "post">
            <br><button>글 작성하기</button>
        </form>
    </div>
    
</body>
</html>