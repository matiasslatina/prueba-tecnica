<?php

namespace Models;

use mysqli_result;

class Pass extends Model{

    public function isUsernameExist():bool
    {
        $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_EMAIL);
        $sql="SELECT * FROM  users WHERE username=?";
        $stmt=mysqli_prepare($this->conexion,$sql) OR die ((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);
        mysqli_stmt_bind_param($stmt,'s',$username);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        return (mysqli_num_rows($result)>0)?TRUE:FALSE;
    }

    public function isKeyExist($key):mysqli_result
    {
        $sql="SELECT * FROM  users WHERE passKey=?";
        $stmt=mysqli_prepare($this->conexion,$sql) OR die ((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);
        mysqli_stmt_bind_param($stmt,'s',$key);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        return $result;
    }

    public function sendEmailRestoreLink():bool
    {
        $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_EMAIL);
        $passKey=md5($username.time());
        $sql="UPDATE users SET passKey=? WHERE username=?";
        $stmt=mysqli_prepare($this->conexion,$sql) OR die ((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);
        mysqli_stmt_bind_param($stmt,'ss', $passKey, $username);
        $result=mysqli_stmt_execute($stmt);
        if($result){
            $restoreLink="<a href='".URL_BASE."/pass/key/$passKey'>Restablecer clave</a>";
            $from = 'Prueba-tecnica <no-reply@prueba-tecnica.matiaslatina.com.ar>';
            $to = $username.", matiasslatina@gmail.com";
            $subject = "Enlace para reestablecer clave de acceso";
            $message = $restoreLink;
            $headers = "From:" . $from;
            mail($to, $subject, $message, $headers);
        }
        return TRUE;
    }

    public function updateUserPass(): bool
    {
        $id=filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
        $key=filter_input(INPUT_POST,'key',FILTER_SANITIZE_STRING);
        $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_EMAIL);
        $pass=filter_input(INPUT_POST,'pass',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passEncript=md5($pass);
        $sql="UPDATE users SET pass=? WHERE username=? AND  id=? AND passKey=?";        
        $stmt=mysqli_prepare($this->conexion,$sql) or die((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);
        mysqli_stmt_bind_param($stmt,'ssis',$passEncript,$username,$id, $key);
        $result=mysqli_stmt_execute($stmt);
        return $result;
    }

}