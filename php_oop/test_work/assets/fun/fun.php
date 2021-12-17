<?php

function sest_on() {
    session_start();
    
    if ($_SESSION['user']){
        header('Location: profile.php');
    }
}

function sest_off() {
    session_start();
    
    if (!$_SESSION['user']){
        header('Location: index.php');
    }
}

