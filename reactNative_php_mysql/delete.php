<?php
    require_once("./db_connection.php");

    // jsonデータを受け取る。
    $datas = json_decode(file_get_contents("php://input"));
    
    try{
        $pdo->beginTransaction();

        // select
        $sql = "SELECT * from user WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":name", $datas->name, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // delete
        $sql = "DELETE FROM user WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":name", $datas->name, PDO::PARAM_STR);
        $stmt->execute();

        // JSON 形式で結果を出力
        header('Content-Type: application/json');
        echo json_encode($results);

        $pdo->commit();
    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        $pdo->rollback();
    }
    
