<?php
    require_once "assets/fun/fun.php";
    sest_off(); 
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    
    <!--    Профиль-->
    
    <form >
        <h3 style="margin: 5px 0;">
            <?php 
            echo "Hello " . $_SESSION['user']['name'];
            ?></h3>
        <?php 
        unset($_SESSION['good']);
        unset($_SESSION['wr_pass']);
        ?>
        <a href="../test_work/inc2/logout.php" class="logout">Выход</a>
    </form>
    

</body>
</html>




