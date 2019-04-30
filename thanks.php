<?php 
  if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.html');
  }
  require_once('function.php');
  
  $nickname = h($_POST['nickname']);
  $email = h($_POST['email']);
  $content = h($_POST['content']);

  // データベースの操作

  // STEP1 接続
  $dsn = 'mysql:dbname=52_phpkiso;host=localhost';
  $user = 'root';
  $password='';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');


  // STEP2 SQL実行
  $sql = 'INSERT INTO survey (email, nickname, content) VALUES (?, ?, ?)';
  $data = array($email, $nickname, $content); // タプル処理
  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>送信完了</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>お問い合わせありがとうございました！</h1>
  <div>
    <h2>お問い合わせ内容</h2>
    <p>ニックネーム:<?php echo $nickname;?></p>
    <p>メールアドレス:<?php echo $email;?></p>
    <p>お問い合わせ内容:<?php echo $content;?></p>
  </div>
</body>
</html>