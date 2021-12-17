<?php

    session_start();
    require_once "../assets/oop/oopmain.php";
    $log = new logReg; 

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    
    $err = [];
    
    $log->getBase();
    for($i=0; $i < count($log->data); $i++){
    if(mb_strlen($_POST['login']) < 6 OR $log->data[$i][1] === $login){
        $err[] = 'login';
    }
    }
    
    if(mb_strlen($_POST['password']) < 6 OR !preg_match('~\d~', $_POST['password'])
            OR !preg_match('~[a-zа-яё]~', $_POST['password'])){
        $err[] = 'password';
    }
    
    if ($password !== $password2 OR $password2 === ''){  
        $err[] = 'password2';
    }
    
    for($i=0; $i < count($log->data); $i++){
    if ($email === '' OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR $log->data[$i][2] === $email){
      $err[] = 'email';
        }
    }
  
    if(mb_strlen($_POST['name']) < 2 OR !preg_match("/^[a-zA-Zа-яА-ЯёЁ]+$/u",$_POST['name'])){
        $err[] = 'name';
    }
    
    if (!empty($err)){
       $response = [
           "status" => false,
           "type" => 1,
           "message" => 'Заполните поля login и password',
           "fields" => $err
       ];
       
       echo json_encode($response);
    }
    
    
    if (empty($err)){
        $password = md5($password);
        $password = "соль" . $password;
    
        $log->data[]=[$name,$login, $email,$password];
        $jsonData = json_encode($log->data);
        file_put_contents('db.json', $jsonData);
        
        $response = [
           "status" => true,
           "message" => 'Регистрация прошла успешно'
        ];
        echo json_encode($response);
    }
    
    ?>