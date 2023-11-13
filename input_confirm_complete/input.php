<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form | Input</title>
</head>
<body>
    <?php
        session_start();

        if (!isset($_SESSION["csrf_token"])){
            $csrf_token = bin2hex(random_bytes(32));
            $_SESSION["csrf_token"] = $csrf_token;
        }

        $token = $_SESSION["csrf_token"];
        
        $user_name = isset($_POST["name"]) ? $_POST["name"] : "";
        $user_email = isset($_POST["email"]) ? $_POST["email"] : "";
        $user_url = isset($_POST["url"]) ? $_POST["url"] : "";
        $user_sex = isset($_POST["sex"]) ? $_POST["sex"] : "";
        $user_age = isset($_POST["age"]) ? $_POST["age"] : "";
        $user_contact = isset($_POST["contact"]) ? $_POST["contact"] : "";
    ?>

    <form method="POST" action="./confirm.php">
        <input type="hidden" name="csrf" value="<?php echo $token; ?>" />

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $user_name;?>" />
        <br />

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $user_email;?>" />
        <br />

        <label for="url">Url</label>
        <input type="url" id="url" name="url" value="<?php echo $user_url;?>" />
        <br />

        <label for="sex">Sex</label>
        <input type="radio" id="radio_male" name="sex" value="male" <?php echo ($user_sex === "male") ? "checked" : null ?> >Male</input>
        <input type="radio" id="radio_female" name="sex" value="female" <?php echo ($user_sex === "female") ? "checked" : null ?>>Female</input>
        <br />

        <label for="age">Age</label>
        <select name="age">
            <option value="0">Please select</option>
            <option value="1" <?php echo ($user_age === "1") ? "selected" : null ?> >~19</option>
            <option value="2" <?php echo ($user_age === "2") ? "selected" : null ?>>20~29</option>
            <option value="3" <?php echo ($user_age === "3") ? "selected" : null ?>>30~39</option>
            <option value="4" <?php echo ($user_age === "4") ? "selected" : null ?>>40~49</option>
            <option value="5" <?php echo ($user_age === "5") ? "selected" : null ?>>50~59</option>
            <option value="6" <?php echo ($user_age === "6") ? "selected" : null ?>>60~</option>
        </select>
        <br />

        <label for="contact">Contact</label>
        <textarea id="contact" name="contact" rows="5" cols="33"><?php echo $user_contact;?></textarea>
        <br />

        <label for="caution">注意事項</label>
        <input type="checkbox" id="caution" name="caution" value="1" />
        
        <input type="submit" id="submitBtn"/>
    </form>
</body>
</html>