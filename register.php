<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/register.css">
    <title>Document</title>
</head>

<body>
    <?php include("inc/header.php"); ?>
    <main>
        <form method="post" action="register_confirm.php" enctype="multipart/form-data">
            <div class="form_contents">
                <h2>会員登録</h2>
                <div class="name">
                    <label for="name"><span class="hissu">必須</span> 名前</label><br>
                    <input type="text" class="formbox" name="name" id="name" required>
                </div>
                <div class="mail">
                    <label for="mail"><span class="hissu">必須</span>メールアドレス</label><br>
                    <input type="text" class="formbox" name="mail" id="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
                <div class="pass">
                    <label for="pass"><span class="hissu">必須</span>パスワード</label><br>
                    <input type="password" class="formbox" name="pass" id="pass" pattern="^[a-zA-Z0-9]{6,}$" required>
                    <!-- 半角全角6文字以上 -->
                </div>
                <div class="pass_confirm">
                    <label for="pass_confirm"><span class="hissu">必須</span>パスワード確認</label><br>
                    <input type="password" class="formbox" name="pass_confirm" id="pass_confirm" oninput="ConfirmPassword(this)" required><br>
                </div>
                <div class="profile">
                    <label for="profile_img">プロフィール写真</label><br>
                    <input type="hidden" name="max_file_size" value="10000000">
                    <input type="file" name="picture" id="profile_img">
                </div>
                <div class="comment">
                    <label for="comment">コメント</label><br>
                    <textarea name="comment" cols="40" rows="10" style="resize: none;" id="comment"></textarea>
                </div>
                <div class="toroku">
                    <input type="submit" class="submit_button" value="登録する">
                </div>
            </div>
        </form>
    </main>
    <?php include("inc/footer.php");?>
    <script>
        function ConfirmPassword(pass_confirm) {
            var input1 = pass.value;
            var input2 = pass_confirm.value;
            if (input1 !== input2) {
                pass_confirm.setCustomValidity("パスワードが一致しません。");
            } else {
                pass_confirm.setCustomValidity('');
            }
        }
    </script>
</body>

</html>