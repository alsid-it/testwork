<?php
    require_once "assets/fun/fun.php";
    sest_on();    
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    
    <!--    Форма авторизации-->
    <form >
        <label>login</label>
        <input type="text" name="login" placeholder="Введите login">
        <label>password</label>
        <input type="password" name="password" placeholder="Введите password">
        <button type="submit" class="login-btn">log in</button>
        <p>
            <a href="/php_oop/test_work/register.php" align="center">Зарегистрировать аккаунт</a> 
        </p>
        
        <p class="msg none">Msg</p>
    </form>
    
    <script src='assets/js/jquery.js'></script>
    <script src='assets/js/main.js'></script>
    
</body>
</html>




