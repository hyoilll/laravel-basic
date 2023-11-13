<?php
    #var_dump($_GET);            # array(1) { ["name"]=> string(5) "hyoil" }
    #var_dump($_GET["name"]);    # string(5) "hyoil" 
    
    if (!empty($_GET["name"])){
        $input_name = $_GET["name"];
        
        echo "入力された名前：{$input_name}";
    }

?>