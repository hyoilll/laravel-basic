<?php
    const DB_HOST = "mysql:dbname=react-crud;host=127.0.0.1;charset=utf8";
    const DB_USER = "react-crud-user";
    const DB_PASSWORD = "react-crud-user";
    const DB_OPTION = [
        PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,        // 返ってくる値を連想配列にする。
        PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,  // 例外を表示する。
        PDO::ATTR_EMULATE_PREPARES      => false,                   // SQLインジェクション対策
    ];

    try{
        $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, DB_OPTION);
        // echo "接続成功 \n";
    }catch (PDOException $e){
        echo "接続失敗 ". $e->getMessage(). "\n";
        exit;
    }