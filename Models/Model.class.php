<?php

namespace Models;

use mysqli_result;

class Model{

    protected $conexion=NULL;

    public function __construct()
    {
        if($this->conexion==NULL){
            $this->conexion = mysqli_connect(HOST,USUARIO,PASS) OR die ((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);;
            mysqli_select_db($this->conexion,DB) OR die ((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);
        }        
        return $this->conexion;
    }

    public function selectLoginUser(): mysqli_result
    {
        $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_EMAIL);
        $pass=filter_input(INPUT_POST,'pass',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passEncript=md5($pass);
        $sql="SELECT * FROM users u WHERE u.username=? AND u.pass=? AND u.delete='0'";
        $stmt=mysqli_prepare($this->conexion,$sql) OR die ((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);
        mysqli_stmt_bind_param($stmt,'ss',$username,$passEncript);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        return $result;
    }


    


}