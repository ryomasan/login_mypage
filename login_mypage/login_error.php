<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/login.css">
    <title>Document</title>
</head>

<body>
    <?php include("inc/header.php"); ?>
    <main>
        <form method="post" action="mypage.php">
            <div class="form_contents">
                <div class="error_message">
                    <p style="color:red;background-color:lightpink;text-align:center">メールアドレスまたはパスワードが違っています。</p>
                </div>
                <div class="mail">
                    <label for="mail">メールアドレス</label><br>
                    <input type="text" name="mail" id="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
                <div class="pass">
                    <label for="pass">パスワード</label><br>
                    <input type="password" name="pass" id="pass" pattern="^[a-zA-Z0-9]{6,}$" required>
                    <!-- 半角全角6文字以上 -->
                </div>
                <div class="keep">
                    <input type="checkbox" name="keep" value="checked">ログイン情報を保存する
                </div>
                <div class="toroku">
                    <input type="submit" class="submit_button" value="ログインする">
                </div>
            </div>
        </form>
    </main>
    <?php include("inc/footer.php"); ?>
</body>

</html>