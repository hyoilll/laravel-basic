<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    <?php
        session_start();

        if(!isset($_SESSION["visited"])){
            echo "初回訪問。";

            $_SESSION["visited"] = 1;
            $_SESSION["date"] = date("c");
        }
        else{
            $_SESSION["visited"] += 1;

            echo $_SESSION["visited"]. "回目訪問です。<br />";

            if(isset($_SESSION["date"])){
                echo "前回訪問した時刻は ". $_SESSION["date"]. " です。<br />";
                $_SESSION["date"] = date("c");
            }
        }

        var_dump($_SESSION);
        echo "<br />";

        var_dump($_COOKIE);
        echo "<br />";
    ?>

</body>
</html>