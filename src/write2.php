<?php
session_start();

$host = 'db'; 
$username = 'exampleuser'; 
$password = 'examplepass';
$database = 'cykor'; 


$dbconn = new mysqli($host,$username,$password,$database);
if(!$dbconn) die("DB연결 실패");

$title = $_POST['title'];
$context = $_POST['context'];
$writer = $_SESSION['userid'];

$create = "INSERT INTO board (title, writer, context) VALUES ('$title','$writer','$context')";
if ($dbconn->query($create) == TRUE) {
    echo '<script>alert("게시글 작성이 완료되었습니다.");window.location.href="main.php";</script>';
} else {
    echo "<script>alert('게시물 등록에 실패했습니다'); history.back();</script>";
}
$dbconn->close();
?>