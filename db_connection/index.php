<?php
    require "./conn.php";

    // ユーザー入力なし　query
    // $sql = "SELECT * FROM contacts WHERE id = 3";
    // $stmt = $pdo->query($sql); // sql 実行, stmt -> PDOStatementクラスのインスタンス
    // $results = $stmt->fetchAll();

    // ユーザー入力あり　prepare, bind, execute SQLインジェクション対策
    // 入力はクエリの一部として解釈されず、単なる文字列として扱われます。これにより、データベースへの不正な操作が阻止される。
    // bindValue メソッドは、指定された値をプレースホルダにバインドします。これは、値が bindValue を呼び出した時点で決定されることを意味します。
    // bindParam は、変数への参照をバインドします。つまり、bindParam を呼び出した後で変数の値が変更されると、その変更がプリペアドステートメントに反映されます。SQLステートメントの実行時に評価される。
    $sql = "SELECT * FROM contacts WHERE id = :id"; //プレースホルダ
    $stmt = $pdo->prepare($sql); // SQLステートメントを実行するための準備を行うために使用
    $id = 3;
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $id = 4;
    $stmt->execute();
    $results = $stmt->fetchAll();

    foreach($results as $result){
        echo "id : ". $result["id"]. "<br/>";
        echo "name : ". $result["name"]. "<br/>";
        echo "email : ". $result["email"]. "<br/>";
        echo "url : ". $result["url"]. "<br/>";
        echo "sex : ". $result["sex"]. "<br/>";
        echo "age : ". $result["age"]. "<br/>";
        echo "contact : ". $result["contact"]. "<br/>";
        echo "<br />";
    }
    