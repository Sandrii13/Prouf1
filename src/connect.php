<?php

//conecxion base de datos con msql
function connectMysql(string $dsn,string $dbuser,string $dbpass){
    try{
        $db = new PDO($dsn, $dbuser, $dbpass);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

    }catch(PDOException $e){
        die( $e->getMessage());
        
    }
    return $db;
}
?>