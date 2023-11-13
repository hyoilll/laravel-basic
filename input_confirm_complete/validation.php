<?php
    
    function validation($req){ // $_POST
        $errors = [];

        if (empty($req["name"] || 20 < mb_strlen($req["name"]))){
            $error[] = "名前は必須です。20文字以内で書いてください。<br />";
        }
        
        if (empty($req["email"]) || !filter_var($req["email"], FILTER_VALIDATE_EMAIL)){
            $error[] = "emailは必須です。正しい形式で入力してください。<br />";
        }

        if (!empty($req["url"]) && !filter_var($req["url"], FILTER_VALIDATE_URL)){
            $error[] = "ホームページは正しい形式で入力してください。<br />";
        }

        if (!isset($req["sex"])){
            $error[] = "性別を選択してください。<br />";
        }

        if (empty($req["age"]) || 6 < $req["age"]){
            $error[] = "年齢を選択してください。<br />";
        }

        if (empty($req["contact"]) || 200 < mb_strlen($req["contact"])){
            $error[] = "お問い合わせは必須です。200文字以内で書いてください。<br />";
        }

        if (empty($req["caution"])){
            $error[] = "注意事項にチェックを入れてください。<br />";
        }

        return $error;
    }