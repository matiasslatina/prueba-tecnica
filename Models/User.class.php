<?php

namespace Models;

use mysqli_result;

class User extends Model{

    public function selectUserById(): mysqli_result
    {
        $id=filter_input(INPUT_POST,'userId',FILTER_VALIDATE_INT);
        $sql="SELECT * FROM  users WHERE id=?";
        $stmt=mysqli_prepare($this->conexion,$sql) or die((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);
        mysqli_stmt_bind_param($stmt,'i',$id);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        return $result;
    }

    public function selectAllUsers(): mysqli_result
    {
        $sql="SELECT * FROM users u WHERE u.delete='0' ";
        $result=mysqli_query($this->conexion,$sql) OR die ((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);;
        return $result;
    }

    public function insertUser(): bool
    {
        $name=filter_input(INPUT_POST,'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_EMAIL);
        $pass=filter_input(INPUT_POST,'pass',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passEncript=md5($pass);
        $sql="INSERT INTO users (name, username, pass, register_date) VALUES (?, ?, ?, CURDATE()) ";
        $stmt=mysqli_prepare($this->conexion,$sql) or die((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);
        mysqli_stmt_bind_param($stmt,'sss',$name,$username,$passEncript);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        return $result;
    }

    public function deleteUser(): bool
    {
        $id=filter_input(INPUT_POST,'userId',FILTER_VALIDATE_INT);
        $sql="UPDATE users u SET u.delete='1' WHERE u.id=?";
        $stmt=mysqli_prepare($this->conexion,$sql) or die((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);
        mysqli_stmt_bind_param($stmt,'i',$id);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        return $result;
    }

    public function updateUser(): bool
    {
        $id=filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
        $name=filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
        $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_EMAIL);
        $sql="UPDATE users u SET u.name=?, u.username=? WHERE u.id=?";        
        $stmt=mysqli_prepare($this->conexion,$sql) or die((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);
        mysqli_stmt_bind_param($stmt,'ssi',$name,$username,$id);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        return $result;
    }

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

    public function isUsernameExistForUpdate():bool
    {
        $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_EMAIL);
        $id=filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
        $sql="SELECT * FROM  users WHERE username=? AND id<>?";
        $stmt=mysqli_prepare($this->conexion,$sql) OR die ((ENTORNO=='DES')?mysqli_error($this->conexion):NULL);
        mysqli_stmt_bind_param($stmt,'si',$username, $id);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        return (mysqli_num_rows($result)>0)?TRUE:FALSE;
    }

}