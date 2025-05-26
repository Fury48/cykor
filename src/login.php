<?php

//세션 시작
session_start();
$host = 'db'; 
$username = 'exampleuser'; 
$password = 'examplepass';
$database = 'cykor'; 

$dbconn = new mysqli($host,$username,$password,$database);
if(!$dbconn) die("DB연결 실패");

//id,pw 입력 받고 변수에 저장
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//로그인 정보 확인
$login = "SELECT * FROM userinfo WHERE id='$lid' AND pw='$lpw'";
$result = $dbconn->query($login);

//로그인 완료시 세션에 사용자 저장
if ($result->num_rows > 0) {
    $_SESSION['userid'] = $lid; // 세션에 사용자 ID 저장
    echo '<script>alert("로그인이 완료되었습니다."); window.location.href="main.php";</script>';
} else {
    echo '<script>alert("아이디 또는 비밀번호가 올바르지 않습니다."); window.location.href="login.html";</script>';
}


$dbconn->close();
?>