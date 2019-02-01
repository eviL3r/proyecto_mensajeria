<?php
if (isset($_POST["user"],$_POST["pass"])&& !empty($_POST["user"])&& !empty($_POST["pass"])){
    #comprobamos que nos vienen datos por POST no vacíos
    $salt="A1B2C3";
    $user=$_POST["user"];
    $pass=md5($salt.$_POST["pass"]);
    #asignamos nombres de variables
    $mysql=new mysqli("localhost","josegon","123456789H");
    #Conectamos con la base de datos de XAMPP

    if ($mysql->select_db("mensajeria")){
        #Conectamos con la base de datos mensajería
        $queryuserpass="SELECT login,password FROM mensajeria.usuarios WHERE login='$user' AND password='{$_POST["pass"]}';";
        $resultadouserpass=$mysql->query("$queryuserpass");
        $comprobacion=$resultadouserpass->fetch_assoc();
        #Extraemos de la base de datos los login y password que coinciden con los parámetros de búsqueda
        $comprobacionuser=$comprobacion["login"];
        $comprobacionpass=$comprobacion["password"];
        #asignamos nombres de variables

        if ($user==$comprobacionuser && $pass==md5($salt.$comprobacionpass)) {
            setcookie("user","$user",time()+60*60); #1 hora
            setcookie("pass","$pass",time()+60*60); #1 hora
            header("location:muro.php");
            #Creamos las variables de sesión necesarias para loguearnos en muro
        }else{
            #error 3
            header("location:inicio.php?e=3");
            #no se ha podido iniciar sesión porque el usuario o contraseña son incorrectos
        }
    }else{
        #error 2
        if ($mysql->connect_errno==2002){
            header("location:inicio.php?e=2");
            #no es posible establecer conexión con la base de datos, volvemos a inicio.php con error a 2
        }
    }
}else{
    #error 1
    header("location:inicio.php?e=1");
    #no se han introducido datos y por lo tanto, se vuelve a inicio.php con error a 1
}



?>