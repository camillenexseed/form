<?php
    $dsn = 'mysql:dbname=52_phpkiso;host=localhost';
    $user = 'root';
    $password='';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

    $sql = 'SELECT * FROM survey';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    // SELECT文の結果を配列に変換する
    $inquiries = $stmt->fetchAll();
    echo '<pre>';
    var_dump($inquiries);
    echo '</pre>';
?>

