<?php

    session_start();
    require_once "../assets/oop/oopmain.php";
    $log = new logReg;  
    
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $log->getBase();
    
    $nf=1;
    $err = [];
    
    if ($login === ''){
      $err[] = 'login';  
    }
    
    if ($password === ''){
      $err[] = 'password';   
    }
    
    if (!empty($err)){
       $response = [
           "status" => false,
           "type" => 1,
           "message" => 'Заполните поля login и password',
           "fields" => $err
       ];
       
       echo json_encode($response); 
       die();
       
    }
    
    $password = "соль" . md5($_POST['password']);
    
    for($i=0; $i < count($log->data); $i++){        
        if($log->data[$i][1] === $login AND $log->data[$i][3] === $password){
            $_POST['name'] = $log->data[$i][0];
            $_POST['email'] = $log->data[$i][2];
            $_SESSION['wr_pass'] = '<p class="msgg">
            Авторизация прошла успешно</p>'; 
            $_SESSION['user'] = [
            "name" => $_POST['name'],
            "email" => $_POST['email']
            ];
            
            $nf=0;
        }
    }
    
    if ($nf === 0){
        $response = [
            "status" => true
            ];
            echo json_encode($response);
        }
    
    if ($nf === 1)
        {     
            $response = [
            "status" => false,
            "message" => 'Не верный логин и/или пароль'
        ];
        echo json_encode($response);
        }
?>
