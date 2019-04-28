<?php 
  if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.html');
  }
  require_once('function.php');
  
  $nickname = h($_POST['nickname']);
  $email = h($_POST['email']);
  $content = h($_POST['content']);
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