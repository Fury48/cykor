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
$delete = "DELETE FROM board WHERE unid = $unid";
if ($dbconn->query($delete) == TRUE) {
    echo '<script>alert("게시글이 삭제되었습니다."); window.location.href="main.php";</script>';
} else {
    echo "<script>alert('게시글 삭제에 실패했습니다'); history.back();</script>";
}

?>