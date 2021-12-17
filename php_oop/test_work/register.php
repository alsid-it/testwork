<?php
    require_once "assets/fun/fun.php";
    sest_on();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    
    <!--    Форма регистрации-->
    
    <form>
    <label>login</label>
    <input type="text" name='login' 
           placeholder="Введите login" >

    <p class='login none' id='msgg'>Логин меньше 6 символов или повторяется с имеющимся в базе</p>
 
    <label>password</label>
    <input type="password" name='password' 
           placeholder="Введите password" >
    <p class='password none' id='msgg'>Пароль должен быть минимум 6 символов 
        и состоять из цифр, и букв</p>
 
    <label>повторите password</label>
    <input type="password" name='password2'
           placeholder="Повторите password">
    <p class='password2 none' id='msgg'>Пароли не совпадают</p>

    
    <label>email</label>
    <input type="email" name='email'
           placeholder="Введите email">
    <p class='email none' id='msgg'>email написан не верно или повторяется с имеющимся в базе</p>
   
    <label>name</label>
    <input type="text" name='name'
           placeholder="Введите name">
    <p class='name none' id='msgg'>Имя должно содержать минимум 2 символа и только буквы</p>

    
    <button type='submit' class="reg-btn">sign up</button>
    <p text-align='center' class="reg">
    <a href="/php_oop/test_work/index.php">Войти в аккаунт</a> 
    </p>
   
    </form>
    
    <script src='assets/js/jquery.js'></script>
    <script src='assets/js/main.js'></script>
    

</body>
</html>

<?php


