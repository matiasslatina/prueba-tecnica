<?php

use Models\User;
use Views\View;

$view=new View();
$user=new User();

if(!isset($_SESSION['username'])){
    header('location: /');
}

if(!isset($uriParts[1])){
    $uriParts[1]='';
}

switch ($uriParts[1]) {
    case 'show':
        if ($_SERVER["REQUEST_METHOD"] == "POST"){         
            $userResult=$user->selectUserById();
            $view->printUserModalContent($userResult,'show');
        }
        break;
    case 'new':
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $view->printUserModalContent();
        }
        break;
    case 'update':
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if($user->isUsernameExistForUpdate()){
                print('USER_EXIST');
            }else{
                $user->updateUser();
                $userAllResult=$user->selectAllUsers();
                $view->printUsersTable($userAllResult);   
            }
        }
        break;
    case 'create':
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if($user->isUsernameExist()){
                print('USER_EXIST');
            }else{
                $user->insertUser();
                $userAllResult=$user->selectAllUsers();
                $view->printUsersTable($userAllResult);
            }
        }
        break; 
    case 'destroy':
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $user->deleteUser();
            print('USER_DESTROY');
        }
        break; 
    case '':
        $userAllResult=$user->selectAllUsers();
        $view->printWelcome($userAllResult);
        break;
    default:
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        break;    
}



?>