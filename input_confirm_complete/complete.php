<?php
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

    $user_name = htmlspecialchars($_POST["name"]);
    $user_email = htmlspecialchars($_POST["email"]);
    $user_url = htmlspecialchars($_POST["url"]);
    $user_sex = htmlspecialchars($_POST["sex"]);
    $user_age = htmlspecialchars($_POST["age"]);
    $user_contact = htmlspecialchars($_POST["contact"]);

    echo "Name : ". $user_name. "<br />";
    echo "Email : ". $user_email. "<br />";
    echo "URL : ". $user_url. "<br />";
    echo "Sex : ". $user_sex. "<br />";
    echo "Age : ". $user_age. "<br />";
    echo "Contact : ". $user_contact. "<br />";

    unset($_SESSION["csrf_token"]);