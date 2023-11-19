<?php
    require_once("./db_connection.php");
    
    // CORS headers - セキュリティ上の理由で、実際の環境に合わせて調整が必要です。
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    // POST データを受け取る
    $datas = json_decode(file_get_contents("php://input"));
    var_dump($datas);

    try{
        $pdo->beginTransaction(); "データ操作の開始";

        $sql = "INSERT INTO user (name, email) VALUES (:user_name, :user_email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":user_name", $datas->name, PDO::PARAM_STR);
        $stmt->bindValue(":user_email", $datas->email, PDO::PARAM_STR);
        $stmt->execute();
    
        $pdo->commit();
    }catch (PDOException $e){
        echo "接続失敗 ". $e->getMessage(). "\n";
        $pdo->rollback();
        exit;
    }

    // 応答を返す
    echo json_encode(["message" => "Data received successfully"]);
