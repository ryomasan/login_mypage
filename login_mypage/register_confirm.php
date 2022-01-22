<?php

$temp_pic_name = $_FILES['picture']['tmp_name'];
$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/' . $original_pic_name;
move_uploaded_file($temp_pic_name, $path_filename);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/register_confirm.css">
    <title>Document</title>
</head>

<body>
    <?php include("inc/header.php");?>
    <main>
        <div class="confirm">
            <div class="form_contents">
                <h2>会員登録 確認</h2>
                <p>こちらの内容で登録しても宜しいでしょうか？</p>
                <div class="name"> 氏名:<?php echo $_POST['name'] ?></div>
                <div class="mail"> メール:<?php echo $_POST['mail'] ?></div>
                <div class="pass">パスワード:<?php echo $_POST['pass'] ?></div>
                <div class="profile"> プロフィール写真<br><?php echo '<img src=' . $path_filename . '>' ?></div>
                <div class="comment"> コメント:<?php echo $_POST['comment'] ?></div>
                <div class="button">
                    <div class="fix">
                        <a href="register.php" class="fix_button">戻って修正する</a>
                    </div>
                    <div class="submit">
                        <form action="register_insert.php" method="post">
                            <input type="submit" class="submit_button" value="登録する">
                            <input type="hidden" value="<?php echo $_POST['name'] ?>" name="name">
                            <input type="hidden" value="<?php echo $_POST['mail'] ?>" name="mail">
                            <input type="hidden" value="<?php echo $_POST['pass'] ?>" name="pass">
                            <input type="hidden" value="<?php echo $path_filename ?>" name="path_filename">
                            <input type="hidden" value="<?php echo $_POST['comment'] ?>" name="comment">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("inc/footer.php");?>
</body>

</html>