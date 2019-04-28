<?php
  if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.html');
  }
  require_once('function.php');

  $nickname = trim(h($_POST['nickname']));
  $email = trim(h($_POST['email']));
  $content = trim(h($_POST['content']));
  // var_dump(preg_match("/PHP/",$content));

  // ニックネーム
  if ($nickname == '') {
    $nickname_result = 'ニックネームが入力されていません。';
  } else if(mb_strlen($nickname) > 20) {
    $nickname_result = '名前が長すぎます';
  } else {
    $nickname_result = 'ようこそ' . $nickname .'様';
  }
  // メールアドレス
  if ($email == '') {
    $email_result = 'メールアドレスが入力されていません。';
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_result = '正しいメールアドレスを入力してください。';
  } else {
    $email_result = 'メールアドレス：' . $email;
  }
  // お問い合わせ内容
  if ($content == '') {
    $content_result = 'お問い合わせ内容が入力されていません。';
  } else if (preg_match("/buang/", $content)) {
    $content_result = '放送禁止用語は使わないでください。';
  } else {
    $content_result = 'お問い合わせ内容：' . $content;
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>入力内容確認</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>入力内容確認</h1>
  <p><?php echo $nickname_result; ?></p>
  <p><?php echo $email_result; ?></p>
  <p><?php echo $content_result; ?></p>
  <form method="POST" action="thanks.php">
    <input type="hidden" name="nickname" value="<?php echo $nickname;?>">
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <input type="hidden" name="content" value="<?php echo $content;?>">
    <input type="button" value="戻る" onclick="history.back()">
    <?php if($nickname != '' && $email != '' && $content != ''):?>

    <input type="submit" value="OK">
  <?php endif; ?>


  </form>
</body>
</html>