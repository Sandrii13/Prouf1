<?php
//render vista
require APP.'/src/render.php';

//Eliminar session
session_destroy();
//ELiminar cookies
if (isset($_COOKIE['email']) && isset($_COOKIE['passwd'])){
    setcookie("email", null, time()-3600, '/');
    setcookie("passwd", null, time()-3600, '/');
}
header("location: ?url=login");
//si esta definida la session
$uname=$_SESSION['uname'] ?? ''; 