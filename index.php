<?php

//activació d'errors
ini_set('display_errors','On');

//configuracio entorn
session_start();

//constant APP
define('APP',__DIR__);

//carreguem gestor de rutes
require APP.'/src/route.php';

//enrutament
$controller=getRoute();

//redirigir a ruta capturada
require APP.'/controllers/'.$controller.'.php';

