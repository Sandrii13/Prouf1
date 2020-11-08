<?php

//render vista
require APP.'/src/render.php';
//si esta definida la session
$uname=$_SESSION['uname'] ?? ''; 
echo render('home',['title'=>'Welcome '.$uname]);