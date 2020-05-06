<?php
// ユーザーモデル

namespace MyApp\Model;

class User extends \MyApp\Model {

  // ユーザー作成
  public function create($values) {

    // メールアドレス重複チェック
    $user = $this->db->prepare('SELECT COUNT(*) AS cnt FROM users WHERE email=?');
    $user->execute(array($values['email']));    //email=?の部分に$_POST['email]を指定
    $record = $user->fetch();//メールアドレスのmemberがいれば1

    if ($record['cnt'] > 0) {  //0か1かが入ってくる
      throw new \MyApp\Exception\DuplicateEmail();    // email重複の例外を返す

    } else {
      // 重複なければ登録

      $stmt = $this->db->prepare("insert into users (email,password,created,modified) values (:email, :password, now(), now())");
      $res = $stmt->execute([
        ':email' => $values['email'],
        ':password' => password_hash($values['password'],PASSWORD_DEFAULT) // defaultのアルゴリズムでハッシュ化
      ]);
    }

    // dot install のこのコードは動かなかった。
    // if($res === false) {
    // throw new \MyApp\Exception\DuplicateEmail();¥
    // }
  }

}
