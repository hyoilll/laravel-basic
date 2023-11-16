<?php
    const DB_HOST = "mysql:dbname=php_basic;host=127.0.0.1;charset=utf8";
    const DB_USER = "php_user";
    const DB_PASSWORD = "php_user";
    const DB_OPTION = [
        PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,        // 返ってくる値を連想配列にする。
        PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,  // 例外を表示する。
        PDO::ATTR_EMULATE_PREPARES      => false,                   // SQLインジェクション対策
    ];

    try{
        $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, DB_OPTION);
        echo "接続成功". "<br/>";
    }catch (PDOException $e){
        echo "接続失敗 ". $e->getMessage(). "\n";
        exit;
    }