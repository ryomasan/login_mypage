<?php
mb_internal_encoding('utf8');
session_start();


// $stmt = $pdo->prepare('select * from login_mypage where mail=:mail and password=:password');
// $stmt->bindValue(':mail',  $_POST['mail']);
// $stmt->bindValue(':password',  $_POST['pass']);
// $stmt->execute();
// $pdo = null;
// while ($row = $stmt->fetch()) {
//     $_SESSION['id'] = $row['id'];
//     $_SESSION['name'] = $row['name'];
//     $_SESSION['mail'] = $row['mail'];
//     $_SESSION['password'] = $row['password'];
//     $_SESSION['comment'] = $row['comments'];
//     $_SESSION['picture'] = $row['picture'];
// }


if (empty($_POST['from_mypage'])) {
    header('Location:login_error.php');
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/mypage_hensyu.css">
    <title>Document</title>
</head>

<body>
    <?php include("inc/header.php"); ?>
    <main>
        <div class="confirm">
            <div class="form_contents">
                <h2>会員情報</h2>
                <div class="button">
                    <div class="submit">
                        <form action="mypage_update.php" method="post">
                            <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="id">
                            <div class="profile">
                                <div class="profile_img">
                                    <?php echo '<img src=' . $_SESSION['picture'] . '>' ?></div>
                                <div class="profile_contents">
                                    <div class="name"><label for="name">名前:</label>
                                        <input type="text" id="name" value="<?php echo $_SESSION['name'] ?>" name="name" required>
                                    </div>
                                    <div class="mail"><label for="name">メール:</label>
                                        <input type="text" id="mail" value="<?php echo $_SESSION['mail'] ?>" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                    </div>
                                    <div class="password"><label for="name">パスワード:</label>
                                        <input type="text" id="password" value="<?php echo $_SESSION['password'] ?>" name="pass" pattern="^[a-zA-Z0-9]{6,}$" required>
                                    </div>
                                    <div class="comment"><textarea name="comment" id="comment"><?php echo $_SESSION['comment'] ?></textarea></div>
                                </div>
                            </div>
                            <input type="submit" class="submit_button" value="この内容に変更する">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("inc/footer.php"); ?>
</body>

</html>