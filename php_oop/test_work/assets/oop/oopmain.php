<?php

class logReg {
    
    public $data;
    
    function getBase() {
        $res = file_get_contents('db.json');
        $this->data = json_decode($res, true);
    }
    
    
    
}
