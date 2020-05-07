<?php
// ユーザーの一覧

require_once(__DIR__.'/../config/config.php');

// ビューに表示するデータをControllerから取得する

// MyAppが全体の名前空雨間
// Controllerはサブ名前空間
// runメソッドを呼び出してユーザーデータを呼び出す

$app = new MyApp\Controller\Index();
$app->run();

/* ユーザーメソッド
今ログインしているユーザーの情報
$app->me()

登録されているユーザーの情報
$app->getValues()->users

*/
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ホーム</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="container">
    <form action="logout.php" method="post" id="logout">
    <div class='row'>
      <span><?php echo h($app->me()->email);?></span><input type="submit" value="ログアウト" name="submit" class="btn">
    </div>
    <input type="hidden" name="token" value="<?php echo h($_SESSION['token']);?>">
    </form>
    <h1>Users<span>(<?php echo count($app->getValues()->users);?>)</span></h1>
    <ul>
    <?php foreach($app->getValues()->users as $user) {?>
      <li><?php echo h($user->email);?></li>
    <?php }?>
    </ul>
  </div>
</body>
</html>
