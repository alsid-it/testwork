<?php

class Crud {
    
     public $name;
     public $login;
     public $email;
     public $password;
    
    public function create($login, $password, $email, $name) {
        $res = file_get_contents ("../inc/db.json");
        $data = json_decode($res, true);
        $err = 0;
        
        for($i=0; $i < count($data); $i++){
        if(mb_strlen($login) < 6 OR $data[$i][1] === $login){
            $err++;
            $err_l = 'true';
        }
        }
        
        if($err_l === 'true'){
        echo "Логин меньше 6 символов или повторяется с имеющимся в базе";
        echo "<br>";
        }
    
        if(mb_strlen($password) < 6 OR !preg_match('~\d~', $password)
            OR !preg_match('~[a-zа-яё]~', $password)){
            echo "Пароль должен быть минимум 6 символов и состоять из цифр, и букв";
            echo "<br>";
            $err++;
        }
    
        for($i=0; $i < count($data); $i++){
            if ($email === '' OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR $data[$i][2] === $email){
            $err++;
            $err_e = 'true';
            }
        }
        
        if($err_e==='true'){
            echo "Email введен неверно или уже используется";
            echo "<br>";
        };
  
        if(mb_strlen($name) < 2 OR !preg_match("/^[a-zA-Zа-яА-ЯёЁ]+$/u", $name)){
            echo "Имя должно содержать минимум 2 символа и только буквы";
            echo "<br>";
            $err++;
        }
    
        if($err > 0){
        }else{
            echo 'Регистрация прошла успешно';
            echo '<br>';
            $password = md5($password);
            $password = "соль" . $password;
            $res = file_get_contents("../inc/db.json");
            $data = json_decode($res, true);
            $data[]=[$name,$login, $email,$password];
            $jsonData = json_encode($data);
            file_put_contents("../inc/db.json", $jsonData);
        }
        
        
    
    }
    
    public function read($login, $password) {
        $res = file_get_contents ("../inc/db.json");
        $data = json_decode($res, true);
        echo 'Логин: ' . $this->login = $login;
        echo '<br>';
        $password = "соль" . md5($password);
        echo 'Пароль: ' . $this->password = $password;
        echo '<br>';

        for($i=0; $i < count($data); $i++){    
        if($data[$i][1] === $login AND $data[$i][3] === $password){
            echo 'Имя: ' . $this->name = $data[$i][0];
            echo '<br>';
            echo 'Почта: ' . $this->email = $data[$i][2];
            echo '<br>';
            }
        } 
    }
    
    public function update($login, $password, $upemail, $upname) {
        $res = file_get_contents ("../inc/db.json");
        $data = json_decode($res, true);
        $upp = 0;
        $password = "соль" . md5($password);
        for($i=0; $i < count($data); $i++){    
        if($data[$i][1] === $login AND $data[$i][3] === $password){
            echo 'Old: ' . $data[$i][0];
            echo '<br>';
            echo 'New: ' . $data[$i][0] = $upname; 
            echo '<br>';
            echo 'Old: ' . $data[$i][2];
            echo '<br>';
            echo 'New: ' . $data[$i][2] = $upemail;
            echo '<br>';
            $jsonData = json_encode($data);
            file_put_contents("../inc/db.json", $jsonData);
            $upp++;
            }
        }
        if ($upp === 0){
            echo 'Нет аккаунтов с таким логином и паролем';
        }
    }
    
    public function delete($login, $password) {
        $res = file_get_contents ("../inc/db.json");
        $data = json_decode($res, true);
        $del = 0;
        $password = "соль" . md5($password);
        for($i=0; $i < count($data); $i++){    
        if($data[$i][1] === $login AND $data[$i][3] === $password){
            unset($data[$i][0]);
            unset($data[$i][1]);
            unset($data[$i][2]);
            unset($data[$i][3]);
            $jsonData = json_encode($data);
            file_put_contents("../inc/db.json", $jsonData);
            echo 'Аккаунт удален';
            echo '<br>';
            $del++;
            }
        }
        if ($del === 0){
            echo 'Нет аккаунтов с таким логином и паролем';
        }
    }
    
    
    
}
