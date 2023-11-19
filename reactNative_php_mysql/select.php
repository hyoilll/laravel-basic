<?php
    require_once("./db_connection.php");
    
    try{
        $input_name = isset($_GET["name"]) ? $_GET["name"] : "";
        
        // $stmt = $pdo->query("SELECT * FROM user WHERE");

        $stmt = $input_name !== "" ? $pdo->prepare("SELECT * FROM user WHERE name = :name") : $pdo->query("SELECT * FROM user");
        $stmt->bindValue(":name", $input_name, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // JSON 形式で結果を出力
        header('Content-Type: application/json');
        echo json_encode($results);
    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
