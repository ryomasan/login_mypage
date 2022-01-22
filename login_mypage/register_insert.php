<?php

$pdo=new PDO('mysql:dbname=lesson01;host=localhost','root','');
$stmt=$pdo->prepare('INSERT INTO login_mypage(name,mail,password,picture,comments)VALUES(?,?,?,?,?)');
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['pass']);
// $stmt->bindValue(4,password_hash($_POST['pass_confirm'],PASSWORD_DEFAULT));
$stmt->bindValue(4,$_POST['path_filename']);
$stmt->bindValue(5,$_POST['comment']);
$stmt->execute();
header('Location:after_register.php');
?>