<?php
mb_internal_encoding('utf8');
session_start();
try {
    $pdo = new PDO('mysql:dbname=lesson01;host=localhost', 'root', '');
} catch (Exception $th) {
    die('<p>申し訳ございません。現在サーバーが込み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインをしてください。</p>
<a href="http://localhost/lesson1/login_mypage/login.php">ログイン画面へ</a>');
}

$stmt = $pdo->prepare('update login_mypage set name=:name,mail=:mail,password=:password,comments=:comments where id=:id');
$stmt->bindValue(":name",  $_POST['name']);
$stmt->bindValue(":mail",  $_POST['mail']);
$stmt->bindValue(":password",  $_POST['pass']);
$stmt->bindValue(":comments",  $_POST['comment']);
$stmt->bindValue(":id",  $_SESSION['id']);
$stmt->execute();
$stmt = $pdo->prepare('select * from login_mypage where mail=:mail and password=:password');
$stmt->bindValue(":mail",  $_POST['mail']);
$stmt->bindValue(":password",  $_POST['pass']);
$stmt->execute();
$pdo = null;
while ($row = $stmt->fetch()) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['comment'] = $row['comments'];
    $_SESSION['picture'] = $row['picture'];
}
header('Location:mypage.php');  

?>