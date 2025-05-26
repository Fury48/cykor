<?php
session_start();
$host = 'db'; 
$username = 'exampleuser'; 
$password = 'examplepass';
$database = 'cykor'; 

$dbconn = new mysqli($host,$username,$password,$database);
if(!$dbconn) die("DB연결 실패");

//id,pw 입력 받고 변수에 저장
$sid = $_POST['sid'];
$spw = $_POST['spw'];

//id 중복 체크
$jungbok = "SELECT * FROM userinfo WHERE id = '$sid'";
$result = $dbconn->query($jungbok);

if($result->num_rows>0) {
    echo '<script>alert("이미 사용중인 ID입니다.");window.location.href="signin.html";</script>';
}
else {
    $signin = "INSERT INTO userinfo (id,pw) VALUES ('$sid','$spw')";
    if ($dbconn->query($signin) == TRUE) {
        echo '<script>alert("가입이 완료되었습니다.");window.location.href="login.html";</script>';
    }
}
$dbconn->close();
?>

