<?php
// ログイン

require_once(__DIR__.'/../config/config.php');

$app = new MyApp\Controller\Login();
$app->run();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="container">
    <form action="" method="post">
    <div class="row">
      <input type="email" name="email" id="email" placeholder="メールアドレス">
    </div>
    <div class="row">
      <input type="password" name="password" id="password" placeholder="パスワード">
    </div>
    <input type="submit" value="ログイン" name="submit" class="btn">
    <p><a class="signup-link" href="/signup.php">サインアップ</a></p>
    </form>
  </div>
</body>
</html>
