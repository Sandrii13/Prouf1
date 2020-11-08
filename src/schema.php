<?php

//Función para autentificar los usuarios
    function auth($db,$email,$pass):bool{
        
        try{     
            $stmt=$db->prepare('SELECT * FROM users WHERE email=:email LIMIT 1');
            $stmt->execute([':email'=>$email]);
            $count=$stmt->rowCount();
            $row=$stmt->fetchAll(PDO::FETCH_ASSOC);  
            
                if($count==1){       
                    $user=$row[0];
                    $res=password_verify($pass,$user['passw']);
               
                        if ($res){
                            $_SESSION['uname']=$user['uname'];
                            $_SESSION['email']=$user['email'];
           
                            return true;
                        }else{
                            return false;
                        }
                }else{
                    return false;
                }
        }catch(PDOException $e){
            return false;
        }
    }

//Funció de inserción de datos
    function insertSchema($db,$table,$data):bool{
        
        if (is_array($data)){
            $columns='';$bindv='';$values=null;
                
                foreach ($data as $column => $value){
                    $columns.='`'.$column.'`,';
                    $bindv.='?,';
                    $values[]=$value;
                }

                $columns=substr($columns,0,-1);
                $bindv=substr($bindv,0,-1);
                  
                $sql="INSERT INTO {$table}({$columns}) VALUES ({$bindv})";

                    try{
                        $stmt=$db->prepare($sql);
    
                        $stmt->execute($values);
                    }catch(PDOException $e){
                        echo $e->getMessage();
                        return false;
                    }
                
            return true;
        }
        return false;
    }

//Función de inserción en Task
    function insertTask($db,$table,$data):bool{
    
        if (is_array($data)){
            $columns='';$bindv='';$values=null;
                
                foreach ($data as $column => $value){
                    $columns.='`'.$column.'`,';
                    $bindv.='?,';
                    $values[]=$value;
                }

                $columns=substr($columns,0,-1);
                $bindv=substr($bindv,0,-1);
                  
                $sql="INSERT INTO {$table}({$columns}) VALUES ({$bindv})";

                    try{
                        $stmt=$db->prepare($sql);
    
                        $stmt->execute($values);
                    }catch(PDOException $e){
                        echo $e->getMessage();
                        return false;
                    }
                
            return true;
        }
        return false;
    }

//Función select con una condición
    function selectCondition ($db,$table,array $fields=null,array $conditions):array{
        
        if (is_array($fields)){
            $columns=implode(',',$fields);
        }else{
            $columns="*";
        }

            $cond="{$conditions[0]}='{$conditions[1]}'";
            $sql="SELECT {$columns} FROM {$table} WHERE {$cond} ";

            $stmt=$db->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
    }

//Función select con una condición retorno email
function selectWhereEmail($db,array $conditions):array{

        $cond="{$conditions[0]}='{$conditions[1]}'";
        $sql="SELECT `email` FROM `users` WHERE {$cond} ";

        $stmt=$db->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
        
}

//Función eliminar una task
function deleteTask($db, $id):bool{

    $sql="DELETE FROM `task` WHERE `id` = '$id'";

    $stmt=$db->prepare($sql);
    $stmt->execute();
    return true;
    
}
?>