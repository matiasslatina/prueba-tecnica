<?php
;
use Models\Model;
use Views\View;

$view=new View();
$model=new Model();

if(isset($_SESSION['username'])){
     
    header('location: /users');
            
}else{    

    if(isset($_POST['submit'])){

        $userResult=$model->selectLoginUser();
        if(mysqli_num_rows($userResult)){
            $user=mysqli_fetch_object($userResult);
            $_SESSION['username']=$user->username;
            $_SESSION['name']=$user->name;
            $_SESSION['id']=$user->id;
            header('location: /users'); 
        }else{
            $view->printLoginForm(ACCESS_DENIED);
        }

    }else{
        
        $view->printLoginForm();

    }

}