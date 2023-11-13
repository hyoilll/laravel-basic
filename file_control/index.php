<?php
    $contact_file = "./.contact.dat";

    // ファイル丸ごと読み込み
    // $file_contents = file_get_contents($contact_file);
    // echo $file_contents;

    // ファイルに書き込み
    // FILE_APPEND : 付け加える
    // file_put_contents($contact_file, "test file"."\n", FILE_APPEND);

    // csv形式読み込み
    // $datas = file($contact_file);

    // foreach($datas as $data){
    //     $lines = explode(",", $data);
    //     echo $lines[0]. "<br />";
    //     echo $lines[1]. "<br />";
    // }

    $fp = fopen($contact_file, "a+");
    $addText = "1行追記". "\n";

    fwrite($fp, $addText);
    fclose($fp);

    // fopen, fread, fwriteなど
    // https://qiita.com/tadsan/items/0955b3de7dc58490ddaf