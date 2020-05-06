<?php

ini_set('display_errors', 1); //エラー表示

date_default_timezone_set('Asia/Tokyo');

define('DSN', 'mysql:dbname=login_form;host=localhost;charset=utf8');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');

define('SITE_URL', 'http://'. $_SERVER['HTTP_HOST']);
// DB接続情報
try {
  $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
  print('DB接続エラー:' . $e->getMessage());
}


require_once(__DIR__.'/../lib/functions.php');
require_once(__DIR__.'/autoload.php');
session_start();
