<?php
mb_internal_encoding('utf8');
session_start();
try {
    $pdo = new PDO('mysql:dbname=lesson01;host=localhost', 'root', '');
} catch (Exception $th) {
    die('<p>申し訳ございません。現在サーバーが込み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインをしてください。</p>
<a href="http://localhost/lesson1/login_mypage/login.php">ログイン画面へ</a>');
}

$stmt = $pdo->prepare('select * from login_mypage where mail=:mail and password=:password');
if (!empty($_SESSION['id'])) {
    $stmt->bindValue(':mail',  $_SESSION['mail']);
    $stmt->bindValue(':password',  $_SESSION['password']);
} else {
    $stmt->bindValue(':mail',  $_POST['mail']);
    $stmt->bindValue(':password',  $_POST['pass']);
}
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
if (empty($_SESSION['id'])) {
    header('Location:login_error.php');
}

if (!empty($_POST['login_keep'])) {
    $_SESSION['login_keep'] = $_POST['login_keep'];
}


if (!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])) {
    setcookie('mail', $_SESSION['mail'], time() + 60 * 60 * 24 * 7);
    setcookie('password', $_SESSION['password'], time() + 60 * 60 * 24 * 7);
    setcookie('login_keep', $_SESSION['login_keep'], time() + 60 * 60 * 24 * 7);
} elseif (empty($_SESSION['login_keep'])) {
    setcookie('mail', time() - 1);
    setcookie('password', time() - 1);
    setcookie('login_keep', time() - 1);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/mypage.css">
    <title>Document</title>
</head>

<body>
    <?php include("inc/header.php"); ?>
    <main>
        <div class="confirm">
            <div class="form_contents">
                <h2>会員情報</h2>
                <div class="hello"><?php echo 'こんにちは &ensp;' . $_SESSION['name'] . ' &ensp;さん' ?></div>
                <div class="profile">
                    <div class="profile_img"><?php echo '<img src=' . $_SESSION['picture'] . '>' ?></div>
                    <div class="profile_contents">
                        <div class="name"> 氏名:<?php echo $_SESSION['name'] ?></div>
                        <div class="mail"> メール:<?php echo $_SESSION['mail'] ?></div>
                        <div class="pass">パスワード:<?php echo $_SESSION['password'] ?></div>
                        <div class="comment"> コメント:<?php echo $_SESSION['comment'] ?></div>
                    </div>
                </div>
                <div class="button">
                    <div class="submit">
                        <form action="mypage_hensyu.php" method="post">
                            <input type="hidden" value="<?php echo rand(1, 10); ?>" name="from_mypage">
                            <input type="submit" class="submit_button" value="編集する">
                            <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="id">
                            <input type="hidden" value="<?php echo $_SESSION['name'] ?>" name="name">
                            <input type="hidden" value="<?php echo $_SESSION['mail'] ?>" name="mail">
                            <input type="hidden" value="<?php echo $_SESSION['password'] ?>" name="pass">
                            <input type="hidden" value="<?php echo '<img src=' . $_SESSION['picture'] . '>' ?>" name="path_filename">
                            <input type="hidden" value="<?php echo $_SESSION['comment'] ?>" name="comment">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("inc/footer.php"); ?>
</body>

</html>