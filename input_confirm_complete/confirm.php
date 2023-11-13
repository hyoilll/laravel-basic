<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form | Confirm</title>
</head>
<body>
    <?php
        require "./validation.php";
        // check validation
        $errors = validation($_POST);
        if (isset($errors)){
            foreach($errors as $err){
                echo $err. "<br />";
            }
            exit;
        }

        // CSRFの対策　悪意のあるページからの送信を防ぐため、自分の入力画面で作成したtokenと合っているか確認する。
        session_start();
        if (htmlspecialchars($_POST["csrf"]) !== $_SESSION["csrf_token"]){
            header("Location: ./input.php");
            exit;
        }

        // クリックジャッキングの対策　html要素が重ならないようにする。 
        header("X-FRAME-OPTIONS:DENY");
        $input_name = "";
        if (!empty(htmlspecialchars($_POST["name"]))){
            // XSSの対策　javascriptの攻撃を防ぐ
            $input_name = htmlspecialchars($_POST["name"]);
        }

        // if (!empty($_POST)){
        //     var_dump($_POST);
        // }
        
        echo "Name : ". $input_name. "<br/>";
        echo "Email : ". $_POST["email"]. "<br/>";
        echo "URL : ". $_POST["url"]. "<br/>";
        echo "SEX : ". $_POST["sex"]. "<br/>";
        $user_age = "";
        if (isset($_POST["age"])){
            $user_age = $_POST["age"];
            switch($user_age){
                case 1:
                    $user_age = "~19";
                    break;
                case 2:
                    $user_age = "20~29";
                    break;
                case 3:
                    $user_age = "30~39";
                    break;
                case 4:
                    $user_age = "40~49";
                    break;
                case 5:
                    $user_age = "50~59";
                    break;
                case 6:
                    $user_age = "60~";
                    break;
            }
        }
        echo "Age : ". $user_age. "<br/>";
        echo "Contact : ". $_POST["contact"]. "<br/>";
    ?>
    
    <form method="POST" action="./input.php">
        <input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST["name"]); ?>" />
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST["email"]); ?>" />
        <input type="hidden" name="url" value="<?php echo htmlspecialchars($_POST["url"]); ?>" />
        <input type="hidden" name="sex" value="<?php echo htmlspecialchars($_POST["sex"]); ?>" />
        <input type="hidden" name="age" value="<?php echo htmlspecialchars($_POST["age"]); ?>" />
        <input type="hidden" name="contact" value="<?php echo htmlspecialchars($_POST["contact"]); ?>" />
        <input type="submit" name="back" value="戻る"/>

    </form>
    <form method="POST" action="./complete.php">
        <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($_POST["csrf"]); ?>" />
        <input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST["name"]); ?>" />
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST["email"]); ?>" />
        <input type="hidden" name="url" value="<?php echo htmlspecialchars($_POST["url"]); ?>" />
        <input type="hidden" name="sex" value="<?php echo htmlspecialchars($_POST["sex"]); ?>" />
        <input type="hidden" name="age" value="<?php echo $user_age ?>" />
        <input type="hidden" name="contact" value="<?php echo htmlspecialchars($_POST["contact"]); ?>" />
        <input type="submit" value="送信"/>
    </form>
</body>
</html>