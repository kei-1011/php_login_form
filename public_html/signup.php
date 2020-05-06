<?php
// 新規登録

require_once(__DIR__.'/../config/config.php');

$app = new MyApp\Controller\Signup();
$app->run();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="container">
    <form action="" method="post">
    <div class="row">
      <input type="email" name="email" id="email" placeholder="メールアドレス" value="<?php echo isset($app->getValues()->email) ? h($app->getValues()->email) : '';?>">
      <p class="error"><?php echo h($app->getErrors('email'));?></p>
    </div>
    <div class="row">
      <input type="password" name="password" id="password" placeholder="パスワード">
      <p class="error"><?php echo h($app->getErrors('password'));?></p>
    </div>
    <input type="submit" value="サインアップ" name="submit" class="btn">
    <p><a class="signup-link" href="/login.php">ログイン</a></p>
    <input type="hidden" name="token" value="<?php echo h($_SESSION['token']);?>">
    </form>
  </div>
</body>
</html>
