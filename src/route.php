<?php

//Función de las rutas
function getRoute():string{
        if(isset($_REQUEST['url'])){
                $url=$_REQUEST['url'];
        }else{
                $url="login";
                }
        switch($url){
                case 'login':
                        return 'login';
                case 'register':
                        return 'register';
                case 'regaction':
                        return 'regaction';
                case 'logaction':
                        return 'logaction';
                case 'logout':
                        return 'logout';
                case 'home':
                        return 'home';
                case 'dashboard':
                        return 'dashboard';
                default:
                        return 'login';
                       }
}