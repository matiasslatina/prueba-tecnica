<?php

spl_autoload_register(function($clase){
    if(is_file("../".str_replace('\\','/',$clase) .".class.php")){
        require_once "../".str_replace('\\','/',$clase) .".class.php";
    }
});