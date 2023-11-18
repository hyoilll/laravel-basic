<?php
    // Connection DB
    require "../db_connection/conn.php";

    session_start();
    if (htmlspecialchars($_POST["csrf"]) !== $_SESSION["csrf_token"]){
        header("Location: ./input.php");
        exit;
    }

    header("X-FRAME-OPTIONS:DENY");
    if (isset(($_POST["back"]))){
        header("Location: ./input.php");
        exit;
    }

    $pdo->beginTransaction(); "データ操作の開始";

    try{
        $user_name = htmlspecialchars($_POST["name"]);
        $user_email = htmlspecialchars($_POST["email"]);
        $user_url = htmlspecialchars($_POST["url"]);
        $user_sex = htmlspecialchars($_POST["sex"]);
        $user_age = htmlspecialchars($_POST["age"]);
        $user_age_orl = htmlspecialchars($_POST["age_orl"]);
        $user_contact = htmlspecialchars($_POST["contact"]);
        $timestamp = date("y-m-d H:i:s", time());

        echo "Name : ". $user_name. "<br />";
        echo "Email : ". $user_email. "<br />";
        echo "URL : ". $user_url. "<br />";
        echo "Sex : ". $user_sex. "<br />";
        echo "Age : ". $user_age. "<br />";
        echo "Contact : ". $user_contact. "<br />";

        // insert to db
        $sql = "INSERT INTO contacts (name, email, url, sex, age, contact, created_at) VALUES (:user_name, :user_email, :user_url, :user_sex, :user_age, :user_contact, :timestamp)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":user_name", $user_name, PDO::PARAM_STR);
        $stmt->bindValue(":user_email", $user_email, PDO::PARAM_STR);
        $stmt->bindValue(":user_url", $user_url, PDO::PARAM_STR);
        $stmt->bindValue(":user_sex", $user_sex, PDO::PARAM_STR);
        $stmt->bindValue(":user_age", $user_age_orl, PDO::PARAM_INT);
        $stmt->bindValue(":user_contact", $user_contact, PDO::PARAM_STR);
        $stmt->bindValue(":timestamp", $timestamp, PDO::PARAM_STR);
        $stmt->execute();

        $pdo->commit();
    }catch (PDOException $e){
        echo "エラー発生。". $e->getMessage();
        $pdo->rollback();
    }

    unset($_SESSION["csrf_token"]);