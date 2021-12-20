<?php

namespace Views;

use mysqli_result;

class View {

    private function loadTemplate(string $path=NULL, array $data=[])
    {
        ob_start();
        extract($data);
        include "templates/$path.template.php";
        return ob_get_clean();
    }

    private function printTemplate(string $path=NULL, array $data=[])
    {
        extract($data);
        include "templates/$path.template.php";
    }

    public function printRetrievePassForm(string $message=NULL){
        $content=$this->loadTemplate("retrievePass",['message'=>$message]);
        $this->printTemplate("index",["content"=>$content]);
    }

    public function printResetPassForm(mysqli_result $result)
    { 
        $user=mysqli_fetch_object($result);
        $content=$this->loadTemplate("resetPass", ['user'=>$user]);
        $this->printTemplate("index",["content"=>$content]);
    }

    public function printLoginForm(string $message=NULL)
    { 
        $content=$this->loadTemplate("login",['message'=>$message]);
        $this->printTemplate("index",["content"=>$content]);
    }

    public function printWelcome(mysqli_result $userAllResult)
    {
        $tableContent=$this->loadTemplate("usersTable",["userAllResult"=>$userAllResult]);
        $content=$this->loadTemplate("welcome",["tableContent"=>$tableContent]);
        $this->printTemplate("index",["content"=>$content]);
    }

    public function printUsersTable(mysqli_result $userAllResult)
    {
        $this->printTemplate("usersTable",["userAllResult"=>$userAllResult]);
    }


    public function printUserModalContent(mysqli_result $userResult=NULL){
        $title="Nuevo usuario";
        $user=NULL;
        $action="users/create";
        if($userResult){
            $user=mysqli_fetch_object($userResult);
            $title="Editando usuario";
            $action="users/update";
        }
        $this->printTemplate("user",compact('title','user','action'));
    }



}