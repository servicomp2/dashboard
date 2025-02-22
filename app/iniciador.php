<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Allow: GET, POST, PUT, DELETE");

session_start();
//Definir la zona horaria de la aplicacion
date_default_timezone_set('America/Caracas');
require_once 'config/config.php';

spl_autoload_register(function($clase){
    require_once 'librerias/'.$clase.'.php';
});
