<?php

define('APP_NAME','PRUEBA TECNICA');

# Acceso a MySQL
define("DB", 'prueba_tecnica');
define("USUARIO", 'root');
define("PASS", '');
define("HOST", 'localhost');

# Mensajes para actualizacion de clave y login 
define("RETRIEVE_OK","Te hemos enviado un correo!");
define("RETRIEVE_FAIL","No exite tal usuario!");
define("RESET_OK","Clave actualizada!");
define("RESET_FAIL","La clave no pudo ser modificada");
define("ACCESS_DENIED","Datos de acceso incorrectos.");

# tipo de entorno
define('ENTORNO','DES'); //'PROD'


if(isset($_SERVER['HTTPS'])){
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
}
else{
    $protocol = 'http';
}
define('URL_BASE',$protocol . "://" . $_SERVER['SERVER_NAME']);
