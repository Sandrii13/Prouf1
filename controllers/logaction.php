<?php
include "src/connect.php";
include "config.php";
include "src/schema.php";

//Variables
$db =connectMysql($dsn, $dbuser, $dbpass);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pass = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$auth= auth($db,$email,$pass);

//If de inicio si se han insertado variables
if($email != null && $pass != null){
    //Si las credenciales son correctas
    if($auth==true){
        //Si selecciona recordar
        if($_POST['remember']=='on' || $_POST['remember']=='1'){
            setcookie('email', $email, time()+(60*60*24*365), '/');
            $pass = password_hash($pass, PASSWORD_BCRYPT, ["cost" => 4]);
            setcookie('passwd', $pass, time()+(60*60*24*365), '/');
            header("location: ?url=home");
        }else{
            header("location: ?url=home");
        }
    }else{
        //Si las credenciales son incorrectas
        ?>
            <script>
            alert("Email or password are incorrect, try again");
            location.href="?url=login";
            </script>
            <?php
    }
}else{
    //Si no inserta datos a comprobar
    ?>
        <script>
        alert("Insert data to login");
        location.href="?url=login";
        </script>
        <?php
}

