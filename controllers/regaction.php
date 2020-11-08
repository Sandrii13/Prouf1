<?php
include "src/connect.php";
include "config.php";
include "src/schema.php";

//Variables
$db =connectMysql($dsn, $dbuser, $dbpass);
$table='users';
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$passwd = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//Contraseña encriptada
$passwd = password_hash($passwd, PASSWORD_BCRYPT, ["cost" => 4]);
$conditions=['email',$email];
$verify= selectWhereEmail($db,$conditions);
$new=empty($verify);

//Si ha insertado los datos pedidos
if($email!=null && $user!=null && $passwd!=null){
    //Si el usuario existe
    if($new == false){
        ?>
        <script>
        alert("This user already exists.");
        location.href="?url=register";
        </script>
        <?php
     //Si el usuario no existe
    } else if ($new == true){
        $data=['email' => $email, 'uname' => $user, 'passw'=> $passwd];
        insertSchema($db, $table, $data);
        ?>
        <script>
        alert("Welcome, please login to enter");
        location.href="?url=login";
        </script>
        <?php
    }
//SI no inserta los datos pedidos
}else{
    ?>
        <script>
        alert("Insert data to register");
        location.href="?url=register";
        </script>
    <?php
    
}



