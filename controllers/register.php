<?php
//render vista
require APP.'/src/render.php';
//si esta definida la session
$uname=$_SESSION['uname'] ?? ''; 
echo render('register',['title'=>'Register '.$uname]);
