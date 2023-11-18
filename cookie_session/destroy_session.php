<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destroy Session </title>
</head>
<body>
    <?php
        session_start();

        echo "sessionを破壊しました。<br />";

        // session連想配列を空配列で上書きする。
        $_SESSION = [];

        // if(isset($_COOKIE["PHPSESSID"])){
        //     setcookie("PHPSESSID", "", time() - 1800, "/");
        // }

        session_destroy();

        echo "session <br />";
        var_dump($_SESSION);
        echo "<br />";

        echo "cookie <br />";
        var_dump($_COOKIE);
        echo "<br />";
    ?>
</body>
</html>