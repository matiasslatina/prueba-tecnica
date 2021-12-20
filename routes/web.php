<?php

$uri= $_SERVER['REQUEST_URI'];

$uriParts=explode('/',$uri);

array_shift($uriParts);

switch ($uriParts[0]) {
    case 'users':
        include_once '../controllers/userController.php';
        break;
    case 'logout':
        session_destroy();
        header("location: ".URL_BASE);
        break;
    case 'pass':    
        include_once '../controllers/passController.php';
        break;
    case 'home':
    case '':    
        include_once '../controllers/loginController.php';
        break;
    default:
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        break;
}