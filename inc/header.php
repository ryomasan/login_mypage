<?php
mb_internal_encoding('utf8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inc/stylesheet/header.css">
    <title><?php echo $title ?></title>
    <meta name="description" content="<?php echo $description; ?>">
</head>

<body>
    <header>
        <img src="image/4eachblog_logo.jpg">
        <?php
        if (!empty($_SESSION['id'])) {
            echo '<div class="nav">';
            echo '<div class="login"><a href="log_out.php">ログアウト</a></div>';
            echo '</div>';
        } else {
            echo '<div class="nav">';
            echo '<div class="register"><a href="register.php">新規登録</a></div>';
            echo '<div class="login"><a href="login.php">ログイン</a></div>';
            echo '</div>';
        }
        ?>

    </header>
</body>

</html>