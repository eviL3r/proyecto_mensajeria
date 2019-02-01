<?php
if(isset($_POST["user"],$_POST["nombre"],$_POST["apellido1"],$_POST["email"],$_POST["pass"],$_POST["pass2"])
    && !empty($_POST["user"])&& !empty($_POST["nombre"])&& !empty($_POST["apellido1"])&& !empty($_POST["email"])&& !empty($_POST["pass"])&& !empty($_POST["pass2"])){
    #Comprobamos que nos vienen datos por POST
    $salt="A1B2C3";
    $user=$_POST["user"]; $nombre=$_POST["nombre"];
    $apellido1=$_POST["apellido1"]; $email=$_POST["email"];
    $pass=md5($salt.$_POST["pass"]); $pass2=md5($salt.$_POST["pass2"]);
    #Asignamos valores a los parámetros que nos vienen por POST
    $mysql= new mysqli("localhost","josegon","123456789H");
    #Conectamos con la base de datos de xampp
    if ($pass==$pass2){
        #si se cumple la premisa de que las contraseñas sean iguales, el usuario es registrado
        if($mysql->select_db("mensajeria")){
            #Seleccionamos la base de datos "mensajeria"
            $mysql->query("INSERT INTO mensajeria.usuarios(nombre,apellido1,apellido2,login,password,email) VALUES('$nombre','$apellido1',NULL,'$user','{$_POST["pass"]}','$email');");
            if(isset($_POST["apellido2"])){
                #si el usuario quiere registrar el segundo apellido
                $apellido2= $_POST["apellido2"];
                $mysql->query("UPDATE mensajeria.usuarios SET apellido2='$apellido2' WHERE login='$user';");
            }
            setcookie("user","$user",time()+60*60);#1 hora
            setcookie("pass","$pass",time()+60*60);#1 hora
            header("location:muro.php");
            #Creamos las sesiones globales para mandarlas a muro y logearnos sin formulario
        }else{
            #error 3
            if ($mysql->connect_errno==2002){
                header("location:registro.php?e=3");
            }
            #no es posible establecer conexión con la base de datos, volvemos a registro.php con error 2
        }
    }else{
        #error 2
        header("location:registro.php?e=2");
        #las contraseñas no coinciden, por lo tanto, se vuelve a registro.php
        #con el parámetro error a 1
    }
}else{
    #error 1
    header("location:registro.php?e=1");
    #No nos viene ningún parámetro por POST, redireccionamos a registro.php
}
?>